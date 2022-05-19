{!! Form::open(['route' => 'public.send.contact', 'method' => 'POST', 'class' => 'contact-form']) !!}
    <div class="form__cont__item flex-row">
        <label for="">お問い合わせ項目</label>
        <div class="form__cont__item__checkbox">
            @php
                $subjects = \Botble\Contact\Models\ContactSubject::all();
            @endphp
            @foreach($subjects as $index => $subject)
            <div class="form__cont__item__checkbox__cont">
                <input 
                    name="subject_id" 
                    type="checkbox" 
                    id="checkbox-{{$index + 1}}" 
                    value="{{$subject->id}}"
                    @if(old('subject_id') == $subject->id)
                    checked
                    @endif
                >
                <label for="checkbox-{{$index + 1}}">{{$subject->name}}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="form__cont__item">
        <div class="form__cont__item__txt">
            <label for="">御社名</label>
            <input name="company" required type="text" value="{{ old('company') }}">
        </div>
        <div class="form__cont__item__txt">
            <label for="">ご担当者様名</label>
            <input name="name" required type="text" value="{{ old('name') }}">
        </div>
        <div class="form__cont__item__txt">
            <label for="">ふりがな</label>
            <input name="name_kana" required type="text" value="{{ old('name_kana') }}">
        </div>
        <div class="form__cont__item__txt">
            <label for="">メールアドレス</label>
            <input name="email" type="text" required value="{{ old('email') }}">
        </div>
        <div class="form__cont__item__txt">
            <label for="">電話番号</label>
            <input name="phone" type="text" required value="{{ old('phone') }}">
        </div>
        <div class="form__cont__item__txt">
            <label for="">お問い合わせ内容</label>
            <textarea name="content" cols="20" required rows="8" value="{{ old('content') }}"></textarea>
        </div>
    </div>
    @if (setting('enable_captcha') && is_plugin_active('captcha'))
    <div class="form__cont__item">
        {!! Captcha::display() !!}
    </div>
    @endif
    <div class="form__cont__item">
        <div class="txt">
            <p>
            「個人情報の取扱いについて」に同意いただいた上で「送信」ボタンをクリックしてください。</p>
        </div>
        <div class="privacy-agree">
            <input type="checkbox" id="privacy" name="privacy">
            <label for="privacy">個人情報の取り扱いに同意する</label>
        </div>
    </div>
    <div class="contact-form-input-group">
        <div class="form__cont__btn">
            <div class="form__cont__btn__submit">
                <button type="submit">送信</button>
            </div>
        </div>
    </div>
    <div class="contact-form-group">
        <div class="contact-message contact-success-message" style="display: none"></div>
        <div class="contact-message contact-error-message" style="display: none"></div>
    </div>
{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <div id="contact-form-modal" class="modal fade">
        <p>この内容で送信してよろしいですか？よろしければ「確認する」をクリックして下さい。</p>
        <div class="form__cont__item flex-row">
            <label for="">お問い合わせ項目</label>
            <div class="form__cont__item__checkbox">
                @php
                    $subjects = \Botble\Contact\Models\ContactSubject::all();
                @endphp
                @foreach($subjects as $index => $subject)
                <div class="form__cont__item__checkbox__cont">
                    <input 
                        name="modal_subject_id" 
                        type="checkbox" 
                        id="checkbox-{{$index + 1}}" 
                        value="{{$subject->id}}"
                        @if(old('subject_id') == $subject->id)
                        checked
                        @endif
                    >
                    <label for="checkbox-{{$index + 1}}">{{$subject->name}}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form__cont__item">
            <div class="form__cont__item__txt">
                <label for="">御社名:</label>
                <label name="modal_company" required type="text" readonly></label>
            </div>
            <div class="form__cont__item__txt">
                <label for="">ご担当者様名:</label>
                <label name="modal_name" required type="text" readonly></label>
            </div>
            <div class="form__cont__item__txt">
                <label for="">ふりがな:</label>
                <label name="modal_name_kana" required type="text" readonly></label>
            </div>
            <div class="form__cont__item__txt">
                <label for="">メールアドレス:</label>
                <label name="modal_email" type="text" required readonly></label>
            </div>
            <div class="form__cont__item__txt">
                <label for="">電話番号:</label>
                <label name="modal_phone" type="text" required readonly></label>
            </div>
            <div class="form__cont__item__txt">
                <label for="">お問い合わせ内容:</label>
                <label name="modal_content" cols="20" required rows="8" readonly></label>
            </div>
        </div>
        <div class="contact-form-input-group">
            <div class="form__cont__btn">
                <div class="form__cont__btn__submit">
                    <button type="submit" id="last_submit">確認する</button>
                </div>
            </div>
        </div>
    </div>
<script>
    
    $('.form__cont__btn__submit button').on('click', function(e){
        var formData = $(".contact-form").serializeArray();
        var formModal = $("#contact-form-modal .form__cont__item__txt label:nth-child(2)");
        e.preventDefault();
        $("input[name=modal_subject_id]").each(function(index, elem) {
                $(elem).prop('checked', false);
        });

        $('input[name="modal_subject_id"]').get(formData[1].value-1).checked = true
        var nullError = false;
        $.each(formData,  function(datakey, datavalue){
            if (datavalue.value !== "") {
                formModal.each(function(key, value){
                if($(this).attr('name').substr(6) == datavalue.name) {
                    $(this).text(datavalue.value);
                }
             });
            } else {
                nullError = true;
            }
        });
        if (nullError != true){
            $('#contact-form-modal').modal();   
        } else {
            $(".contact-form").submit();
        }
    });
    
    $("#last_submit").on('click', function(e){
        $('#contact-form-modal .close-modal').click();
        $(".contact-form").submit();
    });
</script>
<style>
    #contact-form-modal .form__cont__item {
        margin-top:10px;
    }
    #contact-form-modal .form__cont__item .form__cont__item__txt {
        margin-bottom: 10px;
    }
    #contact-form-modal .form__cont__btn__submit{
        margin-top: 20px;
    }
    #last_submit {
        width: 150px;
        letter-spacing: 3px;
        padding: 12px 0;
    }
    #contact-form-modal .form__cont__item__txt label {
        width: 130px;
    }
    #contact-form-modal .form__cont__item__checkbox__cont label {
        cursor: default;
    }
</style>
