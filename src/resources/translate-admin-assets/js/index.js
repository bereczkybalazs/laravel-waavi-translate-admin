var translate = function () {
    this.translate = {};
    this.percents = {};
    this.locales = {};
    this.initDom();
    this.goToParameter();
}

translate.prototype.goToParameter = function () {
    var urlParams = this.URLToArray(window.location.href);
    if (urlParams.hasOwnProperty('group') && urlParams.hasOwnProperty('name')) {
        setTimeout(function () {
            $('#group_' + urlParams.group).click();
            setTimeout(function () {
                $('#translateListOne').animate({
                        scrollTop: $('#item_translateListOne_' + urlParams.name).offset().top
                }, 100);
                setTimeout(function () {
                    $('#item_translateListOne_' + urlParams.name).focus();
                }, 100);
            }, 100);
        }, 200);
    }
}

translate.prototype.URLToArray = function(url) {
    var request = {};
    var pairs = url.substring(url.indexOf('?') + 1).split('&');
    for (var i = 0; i < pairs.length; i++) {
        if (!pairs[i])
            continue;
        var pair = pairs[i].split('=');
        request[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
    }
    return request;
}

translate.prototype.initDom = function () {
    var that = this;
    $('.translation-group').click(function (){
        $('.translation-group').removeClass('active');
        $(this).addClass('active');
        $('#translateSave').prop('disabled', false);
        that.translate = JSON.parse($(this).attr('data-translate'));
        that.percents = JSON.parse($(this).attr('data-percents'));
        that.locales = JSON.parse($(this).attr('data-locales'));
        that.renderSelects();
        that.renderInputs();
    });
    $('.language-switch-input').on('change', function () {
        that.renderInputs();
    });
    $('#translateSave').click(function () {
        that.store();
    });
    $('.table-content-label').scroll(function () {
        $('.table-content-label').scrollTop($(this).scrollTop());
    });
}

translate.prototype.renderSelects = function () {
    for (var i in this.percents) {
        var domKey = '.language-switch-input > option[value=' + i + ']';
        var domValue = $(domKey).attr('data-original');
        $(domKey).html(domValue + ' (' + this.percents[i] + '%)');
    }
}

translate.prototype.reCountPercents = function () {
    for (var i in this.translate) {
        var progress = 0;
        for (var j in this.translate[i]) {
            if (this.translate[i][j].text != '') {
                progress++;
            }
        }
        this.percents[i] = ((progress / this.translate[i].length) * 100).toFixed(2);
    }
    this.renderSelects();
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
                ' id="item_' + listId +'_' + item.item +'"' +
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
            that.reCountPercents();
        },
        error: function () {
            $('#translateModalLabel').html('Error');
            $('#translateModalBody').html('There was an error while saving, please try again.');
            $('#translateModalContainer').modal('show');
        }
    });
}

new translate();
