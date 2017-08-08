var translate = function () {
    var translate = {};
    this.initDom();
}

translate.prototype.initDom = function () {
    var that = this;
    $('.translation-group').click(function(){
        $('.translation-group').removeClass('active');
        $(this).addClass('active');
        that.translate = JSON.parse($(this).attr('data-translate'));
        that.renderInputs();
    });
    $('.language-switch-input').on('change', function () {
        that.renderInputs();
    });
}

translate.prototype.renderInputs = function () {
    this.renderById('translateLanguageOne');
    this.renderById('translateLanguageTwo');
    var that = this;
    $('.translate-input-data').on('keyup', function () {
        console.log($(this).attr('data-locale'));
        that.updateTranslateTextByIdAndLocale()
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
            '<input type="text" data-locale="' + item.locale + '" class="form-control translate-input-data" name="' + item.id + '" value="' + item.text + '">' +
        '</div>'
    );
}

translate.prototype.updateTranslateTextByIdAndLocale = function (text, id, locale) {
    console.log(this.translate);
}

new translate();