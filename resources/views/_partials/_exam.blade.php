<!-- Modal -->
<div class="modal fade" id="examModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">إختبار الدورة</h4>
            </div>
            <form action="{{route('course.exam.solve',$course)}}" method="post">
                {{csrf_field()}} {{method_field('POST')}}
                <div class="modal-body">
                    @if($course->exam && $course->exam->questions->count())
                        @foreach($course->exam->questions as $question)
                            <div class="question">
                                <p>{{$question->subject}}</p>
                                <fieldset id="{{$question->id}}">
                                    @foreach($question->answers as $answer)
                                        <div class="radio">
                                            <label>
                                                <input type="radio"
                                                       name="question[{{$question->id}}]answer"
                                                       id="optionsRadios1"
                                                       value="{{$answer->id}}">
                                                {{$answer->content}}
                                            </label>
                                        </div>
                                    @endforeach
                                </fieldset>

                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            تم التقييم
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    @if(!$course->hasRate->count())
                        <button type="submit" class="btn btn-success">إرسال</button>
                    @endif
                </div>
            </form>


        </div>
    </div>
</div>