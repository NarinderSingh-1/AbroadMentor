jQuery(document).ready(function ($) {
    $('.tooltipped').tooltip({
        enterDelay: 5000,
        inDuration: 5000,
        outDuration: 5000,
        transitionMovement: 0,
        margin: 2
    });
    
    function sortSelectItems(options) {
        var arr = options.map(function(_, o) {
            return {
                t: $(o).text(),
                v: o.value
            };
        }).get();
        
        arr.sort(function(o1, o2) {
            return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
        });
        options.each(function(i, o) {
            o.value = arr[i].v;
            $(o).text(arr[i].t);
        });
    }
    
    $(".select-init-sort").each(function(_, v){
        sortSelectItems($("option", v)); // Sort items
    });
    
    $('.btnRight').click(function (e) {
        var _parent = $(this).parent().parent(), 
            selectedOpts = $(".subject-info-box-1 select option:selected", _parent);
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $(".subject-info-box-2 select", _parent).append($(selectedOpts).clone());
        
        sortSelectItems($(".subject-info-box-2 select option", _parent)); // Sort items
        
        $(selectedOpts).remove();
        e.preventDefault();
    });
    
    $('.btnAllRight').click(function (e) {
        var _parent = $(this).parent().parent(),
            selectedOpts = $(".subject-info-box-1 select option", _parent);
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $(".subject-info-box-2 select", _parent).append($(selectedOpts).clone());
        
        sortSelectItems($(".subject-info-box-2 select option", _parent)); // Sort items
        
        $(selectedOpts).remove();
        e.preventDefault();
    });
    
    $('.btnLeft').click(function (e) {
        var _parent = $(this).parent().parent(),
            selectedOpts = $(".subject-info-box-2 select option:selected", _parent);
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $(".subject-info-box-1 select", _parent).append($(selectedOpts).clone());
        
        sortSelectItems($(".subject-info-box-1 select option", _parent)); // Sort items
        
        $(selectedOpts).remove();
        e.preventDefault();
    });
    
    $('.btnAllLeft').click(function (e) {
        var _parent = $(this).parent().parent(),
            selectedOpts = $(".subject-info-box-2 select option", _parent);
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $(".subject-info-box-1 select", _parent).append($(selectedOpts).clone());
        
        sortSelectItems($(".subject-info-box-1 select option", _parent)); // Sort items
        
        $(selectedOpts).remove();
        e.preventDefault();
    });
    
    $("form.serviceListForm").submit(function() {
        $(".service-selected option").prop('selected', true);
    });
});