<div class="row save-template col-md-4 p-3">
    <div class="col-md-12 text-center">
        <h1>Создание шаблона</h1>
    </div>
    <div class="col-md-12">
        <form id="save-template-form">
            @csrf
            <div class="controls">
                <div class="row p-3">
                    <div class="col-md-12">
                        <label for="template_name">Название шаблона</label>
                        <input id="template_name" type="text" name="template_name" class="form-control" required="required" data-error="Название шаблона">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-12">
                        <label for="template_description">Текст шаблона</label>
                        <textarea rows="5" id="template_description" name="template_description" class="form-control" required="required" data-error="Текст шаблона"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <input id="template_type" type="hidden" name="template_type" class="form-control" required="required">
                <input id="template_id" type="hidden" name="id" class="form-control" value="0">

                <div class="row p-3">
                    <div class="col-md-6 text-center">
                        <a class="btn btn-primary col-6 save-template-button">Сохранить</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a class="btn btn-warning col-6 close-template-button">Закрыть</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>