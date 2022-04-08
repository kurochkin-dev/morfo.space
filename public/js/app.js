$(document).ready(function () {
    var $ = jQuery.noConflict();
    $(function() {
        $('#activator').click(function(){
            $('#box').animate({'top':'0px'},500);
        });
        $('#boxclose').click(function(){
            $('#box').animate({'top':'-700px'},500);
        });
        $('.js-select2').select2();
        $('.datepicker').datetimepicker({format: 'DD/MM/YYYY',});

        $('.cit').click(function () {
            $(this).addClass('active');
            $(this).removeClass('inactive');
            $('.gist').addClass('inactive');
            $('.gist').removeClass('active');
            $('#research_area').val('cit');

            $('.glasses_count').hide();
            $('.glasses_count').css('disabled', true);
            $('.mkbonko').hide();
            $('.mkbonko').css('disabled', true);
            $('.mkb').hide();
            $('.mkb').css('disabled', true);
            $('label.macro_description').html('Характер материала');
            $('.form-header').html('Цитологическая карточка пациента');

            $('.type-gist').hide();
            $('.type-cit').show();
        });

        $('.gist').click(function () {
            $(this).addClass('active');
            $(this).removeClass('inactive');
            $('.cit').addClass('inactive');
            $('.cit').removeClass('active');
            $('#research_area').val('gist');

            $('.glasses_count').show();
            $('.glasses_count').css('disabled', false);
            $('.mkbonko').show();
            $('.mkbonko').css('disabled', false);
            $('.mkb').show();
            $('.mkb').css('disabled', false);
            $('label.macro_description').html('Maкроописание');
            $('.form-header').html('Гистологическая карточка пациента');

            $('.type-cit').hide();
            $('.type-gist').show();
        });

        // Сохранение шаблонов

        $('.save-template-button').click(function () {
            const data = $('#save-template-form').serialize();

            $.ajax({
                url: '/template/save',
                type: 'post',
                data: data,
                success: function(result) {
                    $('.save-template').hide();
                    $('.loader').hide();
                }
            });
        });

        $('.close-template-button').click(function () {
            $('.save-template').hide();
            $('.show-template').hide();
            $('.loader').hide();
        });

        $('.save').click(function () {
            const data = $(this).closest('.textarea').find('textarea');
            const template_type = data.attr('id');
            const template_description = data.val();
            $('#template_description').val(template_description);
            $('#template_type').val(template_type);
            $('.save-template').show();
            $('.loader').show();
        });

        // Показ шаблонов для выбранного типа записей

        $('.show').click(function () {
            $('#show-template').html('');

            const data = $(this).closest('.textarea').find('textarea');
            const template_type = data.attr('id');

            $.ajax({
                url: '/template/get/' + template_type,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    for (var i=0; i<result.length; i++) {
                        $('#show-template').append('<tr data-id="' + result[i].id + '" data-type="' + result[i].template_type + '"><td><div class="row text-center"><div class="col-md-8 template-name"> ' + result[i].template_name + '</div><div class="col-md-2"><i class="fas fa-plus fa-2x insert"></i></div><div class="col-md-2"><i class="fas fa-edit fa-2x edit"></i></div></div><div class="row mt-2"><textarea disabled style="display: none">' + result[i].template_description + '</textarea></div> </td></tr>');
                    }
                    $('.show-template').show();
                    $('.loader').show();
                }
            });
        });
        $(document).on('click', '#show-template tbody tr', function () {
            $(this).find('textarea').toggle()
        });

        $(document).on('click', '.insert', function () {
            const dataType = $(this).closest('tr').attr('data-type');
            const dataContent = $(this).closest('tr').find('textarea').val();
            $('#' + dataType).val(dataContent);
            $('.show-template').hide();
            $('.loader').hide();
        });

        $(document).on('click', '.edit', function () {
            const dataType = $(this).closest('tr').attr('data-type');
            const dataContent = $(this).closest('tr').find('textarea').val();
            const dataContentName = $(this).closest('tr').find('.template-name').html();
            const dataId = $(this).closest('tr').attr('data-id');

            $('#template_description').val(dataContent);
            $('#template_type').val(dataType);
            $('#template_id').val(dataId);
            $('#template_name').val(dataContentName);

            $('.save-template').show();
            $('.show-template').hide();
        });

        $(document).on('click', '#data-table tbody .clipping', function () {
            const id = $(this).attr('data-id');
            $('.clipping_info' + id).toggle();
        });

        $(document).on('click', '.download', function () {
            if(this.checked) {
                $('#download').append('<input type="hidden" name="ids[]" value="' + $(this).attr('name') + '">');
                $('#print').append('<input type="hidden" name="ids[]" value="' + $(this).attr('name') + '">');
            } else {
                $('#download').find('input[value=' + $(this).attr('name') + ']').remove();
                $('#print').find('input[value=' + $(this).attr('name') + ']').remove();
            }
        });

        $(document).on('click', '.full-complete', function () {
            const status = $(this).attr('data-status');

            $.ajax({
                url: '/status/update/' + status,
                type: 'get',
                success: function(result) {
                    location.href = location.href;
                }
            });
        });

        // Поиск

        $('#search').on("input", function () {
            _this = this;

            $.each($("#data-table tbody tr"), function() {
                if($(this).attr('class') !== 'info-field') {
                    if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
                        $(this).hide();
                    } else {
                        if($(this).attr('class') !== 'info-field') {
                            $(this).show();
                        }
                    }
                }
            });
        });

        $("[type=number]").on('input', function() {
            $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё]/, ''));

            if($(this).val !== '' && $(this).val < 0) {
                $(this).val(0);
            }
        });
    });
});