var translate = function () {
    var translate = {};
    this.initDom();
}

translate.prototype.initDom = function () {
    var that = this;
    $('.translation-group').click(function (){
        $('.translation-group').removeClass('active');
        $(this).addClass('active');
        $('#translateSave').prop('disabled', false);
        that.translate = JSON.parse($(this).attr('data-translate'));
        that.renderInputs();
    });
    $('.language-switch-input').on('change', function () {
        that.renderInputs();
    });
    $('#translateSave').click(function () {
        that.store();
    });
}

translate.prototype.renderInputs = function () {
    this.renderById('translateLanguageOne');
    this.renderById('translateLanguageTwo');
    var that = this;
    $('.translate-input-data').on('keyup', function () {
        that.updateTranslateTextByIdAndLocale(
            $(this).val(),
            $(this).attr('data-id'),
            $(this).attr('data-locale')
        );
        $("input[data-id='" + $(this).attr('data-id')+ "']").val($(this).val());
    });
}

translate.prototype.renderById = function (id) {
    var domElement = $('#' + id);
    var locale = domElement.val();
    var listId = domElement.attr('data-render-list');
    $('#' + listId).html('');
    for (var i in this.translate[locale]) {
        var item = this.translate[locale][i];
        this.addInput(listId, item)
    }
}

translate.prototype.addInput = function (listId, item) {

    $('#' + listId).append(
        '<div class="translate-input form-group">' +
            '<input type="text" ' +
                ' data-locale="' + item.locale + '" ' +
                ' class="form-control translate-input-data" '+
                ' data-id="' + item.id + '" value="' + item.text + '">' +
        '</div>'
    );
}

translate.prototype.updateTranslateTextByIdAndLocale = function (text, id, locale) {
    for (var i in this.translate[locale]) {
        if (this.translate[locale][i].id == id) {
            this.translate[locale][i].text = text;
        }
    }
    $('.translation-group.active').first().attr('data-translate', JSON.stringify(this.translate));
}

translate.prototype.store = function () {
    var that = this;
    $.ajax({
        url: window.location + '/resource',
        method: 'post',
        data: {translate: that.translate},
        success: function () {
            $('#translateModalLabel').html('Success');
            $('#translateModalBody').html('Data saved successfully!');
            $('#translateModalContainer').modal('show');
        },
        error: function () {
            $('#translateModalLabel').html('Error');
            $('#translateModalBody').html('There was an error while saving, please try again.');
            $('#translateModalContainer').modal('show');
        }
    });
}

new translate();