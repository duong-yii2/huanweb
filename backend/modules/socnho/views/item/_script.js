$('i.glyphicon-refresh-animate').hide();
function updateItems(r) {
    _opts.items.available = r.available;
    _opts.items.assigned = r.assigned;
    search('available');
    search('assigned');
}

$('.btn-assign').click(function () {
    var $this = $(this);
    var target = $this.data('target');
    var items = $('select.list[data-target="' + target + '"]').val();

    if (items && items.length) {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), {items: items}, function (r) {
            updateItems(r);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});

$('.search[data-target]').keyup(function () {
    search($(this).data('target'));
});

function search(target) {
    var $list = $('select.list[data-target="' + target + '"]');
    $list.html('');
    var q = $('.search[data-target="' + target + '"]').val();

    var groups = {
        role: [$('<optgroup label="Roles">'), false],
        permission: [$('<optgroup label="Permission">'), false],
        route: [$('<optgroup label="Routes">'), false],
    };
    $.each(_opts.items[target], function (name, group) {
        if (name.indexOf(q) >= 0) {
            $('<option>').text(name).val(name).appendTo(groups[group][0]);
            groups[group][1] = true;
        }
    });
    $.each(groups, function () {
        if (this[1]) {
            $list.append(this[0]);
        }
    });
}
var container = $('#permissionTable')
container.find('input.all').on('click', function () {
    if($(this).is(":checked")){
        container.find('input[type="checkbox"]').prop('checked', true);
    }else{
        container.find('input[type="checkbox"]').prop('checked', false);
    }
});

container.find('input[class^="all_"]').on('click', function () {
    var _this = $(this),
        _class = _this.attr('class')
    if($(this).is(":checked")){
        container.find('.'+_class).find('input[type="checkbox"]').prop('checked', true);
    }else{
        container.find('.'+_class).find('input[type="checkbox"]').prop('checked', false);
    }
});

// initial
search('available');
search('assigned');
