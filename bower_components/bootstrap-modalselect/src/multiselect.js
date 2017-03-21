//  multiselect.js
//  Copyright (c) 2014 K12 Services Inc
//  Available under the The MIT License (MIT)

// multiselct.js replaces select elements with a twitter bootstrap dialog with checkboxes or radio buttons
(function ($) {
    $.fn.multiselect = function (fn, options) {
        "use strict";
        if (typeof fn === 'object') {
            options = fn;
            fn = 'init';
        }
        if (typeof fn === 'undefined') {
            fn = 'init';
        }
        //return direct methods
        var directMethods = {
            'widget': function () {
                return $(this).data('multiselect-widget');
            },
            'modal': function () {
                return $(this).data('multiselect-modal');
            }
        };
        var args = arguments;
        Array.prototype.shift.call(args);
        if (args.length > 0) {
            args.shift();
        }
        if (typeof directMethods[fn] === 'function') {
            return directMethods[fn].apply(this, args);
        }

        var methods = {
            init: function (options) {
                var config = $.extend({}, {}, options || {
                    list: 1,
                    target: 'body'
                }, $(this).data());
                var $$ = $(this).hide();
                $$.data('multiselect', config);
                var $div = $('<div class="input-group dropdown-multiselect" />');
                $$.data('multiselect-widget', $div);
                var $span = $('<input class="label-multiselect form-control" readonly />').appendTo($div);
                var $btn = $('<div class="input-group-btn"><button class="btn btn-default" type="button">&nbsp;<span class="caret"></span></button></div>').appendTo($div);
                var modal = '<div class="modal fade modal-multiselect" role="dialog" >';
                modal +=   '<div class="modal-dialog modal-sm">';
                modal += '<div class="modal-content">'
                modal += "</div></div></div>"
                var $modal = $(modal).appendTo($(config.target));
                var $modalContent = $modal.find('.modal-content');
                if ($$.attr('id')) {
                    $modal.attr('id', 'modal-multiselect-' + $$.attr('id'));
                }
                $div.click(function() {
                    $modal.modal('show');
                });
                $$.data('multiselect-modal', $modal);
                var $menu = $('<div class="modal-body" role="multiselect" />').appendTo($modalContent);
                var $controls = $('<div class="modal-footer" role="multiselectcontrols" />').appendTo($modalContent);
                $("<button type='button' >").addClass('btn btn-default').appendTo($controls).text('Close').click(function(e) {
                    $modal.modal('hide');
                });
                if ($$.attr('multiple')) {
                    $controls.append($("<button type='button' class='btn btn-default btn-xs pull-left' />").html('<i class="icon-check-empty"></i>uncheck all').click(function() {
                        $$.val('');
                        $menu.find(":checkbox").attr('checked', false);
                        $$.multiselect('refreshLabel');
                    }));
                    $controls.append($("<button type='button' class='btn btn-default btn-xs  pull-left' />").html('<i class="icon-check"></i>check all').click(function() {
                        $menu.find(":checkbox").each(function() {
                            if ($(this).is(':checked') === false) {
                                $(this).prop('checked', true);
                                $(this).trigger('change');
                            }
                        });

                    }));
                }
                $div.insertAfter($$);
                $$.multiselect('refresh');
            },
            refresh: function () {
                var $menu = $(this).multiselect('modal').find('[role=multiselect]').empty();
                var $container = $menu.parent();
                $menu.detach();
                var $$ = $(this);
                var val = $$.val();
                var type = ($$.attr('multiple')) ? 'checkbox' : 'radio';
                var click = function() {
                    var check = $(this).is(":checked");
                    var self = this;
                    if ($$.attr('multiple')) {
                        var values = $$.val() || [];
                        if (check) {
                            values.push($(this).val());
                        } else {
                            values.splice($.inArray($(this).val(), values), 1);
                        }
                        $$.val(values).multiselect('refreshLabel').trigger('change');
                        return $(this);
                    }
                    $menu.find("input[type=radio]").each(function() {
                        if (this !== self) {
                            $(this).prop('checked', false);
                        }
                    });
                    $$.multiselect('modal').modal('hide');
                    $$.val($(this).val()).multiselect('refreshLabel').trigger('change');
                    return $(this);
                };
                var $lastParent = $$;
                var $appendTo = $('<ul class="multiselect-menu" />').appendTo($menu);
                var $optGroup = null;
                $$.find('option').each(function() {
                    if ($(this).parent().is($lastParent) === false) {
                        $lastParent = $(this).parent();
                        if ($lastParent.is('optgroup')) {
                            $optGroup = $('<li />').append($('<label class="optgroup" />').text($lastParent.attr('label')));
                        }
                    }

                    if ($optGroup !== null) {
                        $($optGroup).append(
                            $("<ul />")
                                .append(
                                    $("<li />")
                                        .append(
                                            $('<label />').append(
                                                    $('<input type="' + type + '" />')
                                                        .attr({
                                                            checked: (typeof val === 'string') ? val === $(this).val() : $.inArray($(this).val(), val) > -1,
                                                            value: $(this).val()
                                                        })
                                                        .change(click)
                                                )
                                                .append($(this).text())
                                        )
                                )
                        );
                        $($optGroup).appendTo($appendTo);
                    }

                    if ($optGroup === null) {
                        $("<li />").appendTo($appendTo).append($('<label />')
                            .append(
                                $('<input type="' + type + '" />')
                                    .attr({
                                        checked: (typeof val === 'string') ? val === $(this).val() : $.inArray($(this).val(), val) > -1,
                                        value: $(this).val()
                                    })
                                    //.click(click)
                                    .change(function() {
                                        click.apply(this);
                                    })
                            )
                            .append($(this).text()));
                    }
                });
                $container.prepend($menu);
                $$.multiselect('refreshLabel');
            },
            refreshLabel: function () {
                var self = this;
                var $$ = $(this).multiselect('widget');
                var txt = '';
                var options = $(this).data('multiselect');
                var val = $(this).val() || [];
                if (typeof val === 'string') {
                    txt = $(this).find('[value="' + val + '"]').text();
                } else {
                    var len = val ? val.length : 0;
                    if (len > options.list || len === 0) {
                        txt = len + ' of ' + $(this).find('option').length + ' selected';
                    } else {
                        var texts = [];
                        $.each(val, function(index, v) {
                            texts.push($(self).find('[value=' + v + ']').text());
                        });
                        txt = texts.join(', ');
                    }
                }
                $$.find('.label-multiselect').val(txt);
            }
        };
        return $(this).each(function () {
            methods[fn].apply(this, args);
        });
    };

    $('select.multiselect').multiselect();
})(jQuery);

