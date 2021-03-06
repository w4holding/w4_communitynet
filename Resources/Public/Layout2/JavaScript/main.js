
;(function($){
    $(window).on('load ready', function() {

        getScrollbarWidth();

        windowResize();

        siteHeaderInit();

        tableResponsiveInit();

        homePageNews();
        initCounters();

        initIframeModal();
        initFooterSearchbox();
        datatablesProducts();
        sidebar();

        initEventsCategories();

    });
})(jQuery);

function getScrollbarWidth() {
    if (window.innerWidth - document.documentElement.clientWidth < 1) {
        $('body').addClass('no-scrollbar');
    }
}

function windowResize() {
    let f = () => {
        window.isMobile = window.innerWidth < 992;
    };

    $(window).on('resize', f);
    f(); // first init
}


function siteHeaderInit () {
    siteHeaderMenuInit();
}


function siteHeaderMenuInit () {
    let $menu = $('.navbar-nav'),
        $firstLvlItems = $menu.find('> li'),
        $firstLvlItemsLinks = $firstLvlItems.find('> a');

    $menu.find('li').each(function (i, el) {
        let $el = $(el);

        if ($el.find('> ul').length) {
            $el.addClass('has-inner');
        }
    });

    let closeAllSubMenus = function ($parent) {

        $firstLvlItems.each(function (i, el) {
            let $el = $(el);

            if ($el.hasClass('opened')) {
                closeSubMenu($el);
            }
        });
    };

    let openSubMenu = function ($parent) {
        closeAllSubMenus();

        $parent.addClass('opened');

        let $inner = $parent.find('> ul');

        if ($inner.length) {
            $inner.slideToggle();
        }

    };

    let closeSubMenu = function ($parent) {
        $parent.removeClass('opened');

        let $inner = $parent.find('> ul');

        if ($inner.length) {
            $inner.slideToggle();
        }
    };

    $firstLvlItemsLinks.on('click', function (e) {
        if (!window.isMobile) return true;

        e.preventDefault();
        let $parent = $(this).parent();

        if ($parent.hasClass('opened')) {
            closeSubMenu($parent);
        }
        else {
            openSubMenu($parent);
        }
    });
}


function tableResponsiveInit() {
    let $tableResponsive = $('.table-responsive, .table-responsive-lg');

    $tableResponsive.each(function (i, el) {
        let $tableWrap = $(el);
        let $table = $tableWrap.find('.table');

        let $firstItemInRow = $table.find('thead th:first-of-type, tbody th, tfoot th');

        $tableWrap.on('scroll', function (e) {
            let scrollLeft = el.scrollLeft;

            $firstItemInRow.css({ left: scrollLeft + 'px' });
        });
    })
}

function homePageNews() {
    $('.news-list-home .article ').click(function(){
      var url = $(this).find('.article-more').attr('href');
      if(url.length > 0){
        window.location = url;
      }      
    });
}
/* Counters */
function initCounters() {
    $(".w4-counters-counter").each(function (e, item) {
        if ( ($(this).attr("data-done")==0) && ($(this).isInViewport()) ) {
            animate(document.getElementById($(this).attr("data-target")), $(this).attr("data-starting_number"), $(this).attr("data-ending_number"), $(this).attr("data-duration"), $(this).attr("data-append"));
            $(this).attr("data-done", "1");
        }
    });
}

function animate(obj, initVal, lastVal, duration, append) {
    console.log('obj',obj);
    console.log('initVal',initVal);
    console.log('lastVal',lastVal);
    console.log('duration',duration);
    console.log('append',append);
    let startTime = null;
    //get the current timestamp and assign it to the currentTime variable
    let currentTime = Date.now();
    //pass the current timestamp to the step function
    const step = (currentTime ) => {
        //if the start time is null, assign the current time to startTime
        if (!startTime) {
            startTime = currentTime ;
        }
        //calculate the value to be used in calculating the number to be displayed
        const progress = Math.min((currentTime  - startTime) / duration, 1);
        //calculate what to be displayed using the value gotten above
        let thisval = Math.floor(progress * (lastVal - initVal) + initVal)
        if (thisval>lastVal) {
            thisval = lastVal;
        }
        obj.innerHTML = thisval.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + append;
        //checking to make sure the counter does not exceed the last value (lastVal)
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
        else{
            window.cancelAnimationFrame(window.requestAnimationFrame(step));
        }
    };

    //start animating
    window.requestAnimationFrame(step);
}


$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();
    return elementBottom > viewportTop && elementTop < viewportBottom;
};



$(window).scroll(function() {
    initCounters();
});

function initIframeModal() {
    const modals = document.querySelectorAll(".modal-iframe");

    modals.forEach(function(mod) {
        mod.addEventListener('hidden.bs.modal', function (event) {
            $(".modal-iframe iframe").each(function (){
                $(this).attr("data-url", $(this).attr("src"));
                $(this).attr("src", "");
            })


    });

    })
    $(".modal-iframe-link").click(function () {
        $(".modal-iframe iframe").each(function () {
            $(this).attr("src", $(this).attr("data-url"));
        });
         $(this).parents('.video-embed').find('.modal-iframe').modal('show');

    });
}

lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'disableScrolling': true,


});

function datatablesProducts() {

    $('#list-of-products.ce-table').dataTable({
        responsive: true,
        "paging": false,
        "info": false,
        "language": {search: ""},
        "searching": true,
        "columnDefs": [
            {
                "targets": [ 5 ],
                "visible": false
            }
        ]
    });

    var table = $('#list-of-products.ce-table').DataTable();

    $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));

    var categoryIndex = 5;
    // $("#list-of-products.ce-table th").each(function (i) {
    //     if ($(this).html().trim() == "Category") {
    //         categoryIndex = i;
    //         return false;
    //     }
    // });


    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var selectedItem = $('#categoryFilter').val()
            var category = data[categoryIndex];
            if (selectedItem === "" || category.includes(selectedItem)) {
                return true;
            }
            return false;
        }
    );

    $("#categoryFilter").change(function (e) {
        table.draw();
        $("#list-of-products.ce-table th").css('width', '');
    });
    table.draw();
    $("#list-of-products.ce-table th").css('width', '');

    $("#list-of-products_filter input").attr("placeholder", "Suche")
}
function sidebar() {
    if ( $(".content-home").length && $("#top-contact-bar").length ) {
        $(".content-home").prepend($("#top-contact-bar"));
        $("#side-contact-bar").remove();
    } else if ($("#top-contact-bar").length) {
        $("#footer").prepend($("#top-contact-bar"));
        $("#sidebar #top-contact-bar").remove();
        $("#top-contact-bar").addClass("sticky");
    }
}
function initFooterSearchbox() {
    $('#tx_indexedsearch_footer button').click(function(){
      if (!$('#tx_indexedsearch_footer #tx-indexedsearch-searchbox-sword').val()) {
        return false;
      }
    });
}

function initEventsCategories() {
    if ( typeof eventCategories != 'undefined' && eventCategories instanceof Array ) {
        $.each(eventCategories, function( index, value ) {
            $.each(value, function( indexx, valuex ) {
                if ( typeof valuex != 'undefined' ) {
                    $("#events-container-" + index + " .events-categories .nav-cats").append('<li><label for="category-' + index + '-' + indexx + '" class="checkboxcontainer"><input type="checkbox" name="category-' + index + '-' + indexx + '" id="category-' + index + '-' + indexx + '" value="' + indexx + '" data-target="' + index + '" class="cat" checked="true" /><span class="checkmark"></span>' + valuex + '</label></li>');
                }
            });
            $("#events-container-" + index + " .events-categories .nav-cats li input").on('change', function (e) {
                if ($(this).val()=="0") {
                    if ($(this).prop("checked") == true) {
                        $("#events-container-" + $(this).attr("data-target") + " .events-categories .nav-cats li input").prop("checked", true);
                    } else {
                        $("#events-container-" + $(this).attr("data-target") + " .events-categories .nav-cats li input").prop("checked", false);
                    }
                } else {
                    if ($(this).prop("checked") == false) {
                        $("#events-container-" + $(this).attr("data-target") + " .events-categories .nav-cats li input#category-" + $(this).attr("data-target") + "-0").prop("checked", false);
                    } else if ( $("#events-container-" + $(this).attr("data-target") + " .events-categories .nav-cats li input.cat:checked").length == $("#events-container-" + $(this).attr("data-target") + " .events-categories .nav-cats li input.cat").length ) {
                        $("#events-container-" + $(this).attr("data-target") + " .events-categories .nav-cats li input#category-" + $(this).attr("data-target") + "-0").prop("checked", true);
                    }
                }
                $("#events-container-" + $(this).attr("data-target") + " .article").hide();
                $("#events-container-" + $(this).attr("data-target") + " .events-categories .nav-cats li input").each(function (i, el) {
                    if ($(this).prop("checked") == true) {
                        $("#events-container-" + $(this).attr("data-target") + " .article[data-categories*='," + $(this).val() + ",']").show();
                    }
                });
            });
        });
    }
}
