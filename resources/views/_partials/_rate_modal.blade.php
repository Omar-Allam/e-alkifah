<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">قيم المحاضرة</h4>
            </div>
            <form action="{{route('course.rate',$course)}}" method="post">
                {{csrf_field()}} {{method_field('POST')}}
                <div class="modal-body">
                    @if(!$course->hasRate->count())
                        @foreach($course->questions as $question)
                            <div class="question">
                                <p>{{$question->content}}</p>
                                <fieldset id="{{$question->id}}">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rate[{{$question->id}}]" id="optionsRadios1"
                                                   value="4"
                                                   checked>
                                            ممتاز
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rate[{{$question->id}}]" id="optionsRadios2"
                                                   value="3">
                                            جيد جدا
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rate[{{$question->id}}]" id="optionsRadios2"
                                                   value="2">
                                            جيد
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rate[{{$question->id}}]" id="optionsRadios2"
                                                   value="1">
                                            ضعيف
                                        </label>
                                    </div>
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
                        <button type="submit" class="btn btn-success">قيم</button>
                    @endif
                </div>
            </form>


        </div>
    </div>
</div>