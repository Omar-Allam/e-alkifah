<div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">إضافة محتوى</h4>
            </div>
            <form action="{{route('course.addContent',$course)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}} {{method_field('POST')}}
                <div class="modal-body">
                    <div class="form-group" dir="rtl">
                        <label for="video_url">{{t('ملفات الفيديو')}}</label>
                        <input type="file" id="video_url" name="videos[]" multiple accept=".mov,.mp4">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    <button type="submit"  class="btn btn-success">إضافة</button>
                </div>
            </form>
        </div>
    </div>
</div>