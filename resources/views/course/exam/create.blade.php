@extends('layout.app')

@section('body')
    <form method="post" action="{{route('exam.store')}}">
        {{csrf_field()}}{{method_field('POST')}}
        <div class="form-group" dir="rtl">
            <label for="course_subject">{{t('الدورة')}}</label>
            <select class="form-control" name="course_id">
                @foreach(\App\Course::all() as $course)
                    @if(!$course->exam)
                        <option value="{{$course->id}}">{{t($course->name)}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            <button class="btn btn-primary" id="addQuestion"><i class="fa fa-plus"></i> {{t('إضافة سؤال')}}</button>
        </div>
        <div id="Questions">

        </div>

        <button type="submit" id="submitButton" style="display: none" class="btn btn-default pull-right"
                dir="rtl">{{t('إضافة إختبار')}} <i
                    class="fa fa-plus"></i></button>
    </form>
@endsection

@section('javascript')
    <script>
        var questions = 0
        $('#addQuestion').click(function (e) {
            e.preventDefault()
            questions++

            $('button#submitButton').css('display', 'block')

            $('#Questions').append(`
            <div class="form-group" dir="rtl">
             <button class="btn btn-sm btn-danger" type="button"  id="removeQuestion"><i class="fa fa-trash"></i></button>
            <div class="form-group" dir="rtl">
                <label for="exampleInputPassword1">السؤال ` + questions + `</label>
                <input type="text" class="form-control" id="course_subject" name="question[` + questions + `][subject]" placeholder="">
                <div class="col-md-offset-1" dir="rtl" style="padding: 10px;">
                    <div class="form-group form-inline">
                        <label for="exampleInputPassword1">{{t('الإجابة ١ :')}}</label>
                        <input type="text" class="form-control" id="course_subject"
                               name="question[` + questions + `][answers][0][content]" placeholder="">
                        <input type="radio" class="" id="course_subject" name="question[` + questions + `][right]" value="1"
                               placeholder="">
                    </div>

                    <div class="form-group form-inline">
                        <label for="exampleInputPassword1">{{t('الإجابة ٢ :')}}</label>
                        <input type="text" class="form-control" id="course_subject"
                               name="question[` + questions + `][answers][1][content]" placeholder="">
                        <input type="radio" class="" id="course_subject" name="question[` + questions + `][right]" value="2"
                               placeholder="">

                    </div>
                    <div class="form-group form-inline">
                        <label for="exampleInputPassword1">{{t('الإجابة ٣ :')}}</label>
                        <input type="text" class="form-control" id="course_subject"
                               name="question[` + questions + `][answers][2][content]" placeholder="">
                        <input type="radio" class="" id="course_subject" name="question[` + questions + `][right]" value="3"
                               placeholder="">
                    </div>
                </div>

            </div>
        </div>`)
        })

        $(document).on('click', 'button.btn-danger', function (e) {
            $(this).parent().remove()
            questions--
            if (questions === 0) {
                $('button#submitButton').css('display', 'none')
            }
        })

    </script>
@endsection