
<!-- Modal -->
<div class="modal fade" id="CameraTaskModal" tabindex="-1" role="dialog" aria-labelledby="CameraTaskModalModalLabel" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="CameraTaskModalModalLabel">กรอกรายละเอียดการจองพนักงานถ่ายภาพ</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="/cameratask/create">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label>ตั้งแต่วัน/เวลา:</label>
                        <div class='input-group date' id='camstart_at'>
                            <input name="start_at" type='text' class="form-control" />
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>จนถึงวัน/เวลา:</label>
                        <div class='input-group date' id='camfinish_at'>
                            <input name="finish_at" type='text' class="form-control" />
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="place">สถานที่:</label>
                        <select class="form-control" name="place">

                            <option>ภายใน กรุงเทพและปริมณฑล</option>
                            <option>ภายนอก กรุงเทพและปริมณฑล</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">รายละเอียดการจอง:</label>
                        <textarea class="form-control" name="description" rows="2" ></textarea>
                    </div>


                    <div class="form-group">
                        <label for="contactNumber">เบอร์โทรศัพท์ที่ติดต่อได้:</label>
                        <textarea class="form-control" name="contactNumber" rows="1" ></textarea>
                    </div>



                    <div class="form-group">
                        <label for="cameraMan">พนักงานถ่ายภาพ :</label>
                        <select class="form-control" name="cameraMan">
                            <option>นาย ณัฐนันธน์ กัญจนปรัชญ์</option>
                            <option>อื่นๆ</option>
                        </select>
                    </div>


                    @include('layouts.errors')
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit"  class="btn btn-primary">จอง</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

                        </div>

                    </div>
                </form>



            </div>

        </div>
    </div>
</div>