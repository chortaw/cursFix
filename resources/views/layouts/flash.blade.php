{{--FOR FLASH SUCCESS--}}
@if($flash = session('message'))
    <div id="flash-message" class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{$flash}}
    </div>
@endif
{{--FOR FLASH DANGER--}}
@if($flashdanger = session('messagedanger'))
    <div id="flash-message" class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{$flashdanger}}
    </div>
@endif



{{--STYLE FLASH--}}
<style>

    #flash-message{
        text-align: center;

    }
</style>
