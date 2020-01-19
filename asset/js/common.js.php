
const cburl = document.head.querySelector("[name='codebox-url'][content]").content;
const cbcdn = document.head.querySelector("[name='codebox-cdn'][content]").content;
const cbimg = document.head.querySelector("[name='codebox-img'][content]").content;
const cbjs = document.head.querySelector("[name='codebox-js'][content]").content;
const cbst = document.head.querySelector("[name='codebox-st'][content]").content;
const cbsi = document.head.querySelector("[name='codebox-si'][content]").content;
const STSI = '&st='+cbst+'&si='+cbsi;

function initdatepicker() {
    $('input.cb-datep').datepicker({
        showOn: 'button',
        buttonImage: cbimg+'ui/calendarD.png',
        buttonImageOnly: true,
        buttonText: 'Select date',
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
}
function CopyToClipboard(containerid) {
    if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("copy");

    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().addRange(range);
        document.execCommand("copy");
        notifa (
            'info','fa fa-info','Copy',
            'The target copy as text in clipboard.',
            3000,1,0
        );    }
}

function notifa (type,icon,title,text,delay=4000,exit=1,pbar=1,) {
	$.notify({
		icon: icon,
		title: title+'<br>',
		message: text
	},{
		type: type,
		allow_dismiss: exit,
		showProgressbar: pbar,
		animate: {
			enter: 'animated flipInY',
			exit: 'animated flipOutX'
		},
		placement: {
			from: "bottom",
			align: "right"
		},
		offset: {
			x: 25,
			y: 75
		},
		delay: delay,
		timer: 20,
		z_index: 9999999
	});
}
function ajaxNotify (resp,title) {
	if(resp.e==0) {
		if(resp.res) {
		    title="<i class='icon-check'></i> "+title;
			notifa (
				'success','fa fa-success',title,
				resp.val,
				4500,1,1
			);
            $('.modal').modal('hide');
        } else {
            title="<i class='icon-info'></i> "+title;
			notifa (
				'danger','fa fa-warning',title,
				resp.val,
				6000,1,1
			);
		}
	} else {
        title="<i class='icon-info'></i> "+title;
		notifa (
			'danger','fa fa-warning',title,
			resp.e,
			7000,1,1
		);													
	}
}


$(document).ajaxStart(function() {
  $("#gloading-ajax").show();
});


$(document).ajaxError(function(event, request, settings) {
    notifa (
        'danger','fa fa-warning','Ajax Error',
        request.statusText,
        7000,1,1
    );
    $("#gloading-ajax").hide();
});

$(document).ajaxStop(function() {
  $("#gloading-ajax").hide();
});

$(document).ajaxComplete(function() {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();
    $('input').attr('autocomplete','nope');
    initdatepicker();
});
$(document).ready(function(){
	$("#gloading-ajax").hide();
    initdatepicker();


	// home only
	$('#mainRight').sortable({handle: '.handle'});
	$('#mainLeft, #mainCenter').sortable({connectWith: '.connected',handle: '.handle'});
    $('input').attr('autocomplete','nope');
    $('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip"]').tooltip();
	$('.sidebar .sidebar-nav').perfectScrollbar();
	$( "#datepicker" ).datepicker({inline: true});
	$(".megamenu").on("click", function(e) {e.stopPropagation();});


	// mini sidebar state
	$('.sidebar-minimizer').click(function(){
		$(this).data('state', ($(this).data('state') == 0 ? 1 : 0));
		Cookies.set('sidebar', $(this).data('state'));
	});
	if(Cookies.get('sidebar') == 1) {
		$('.sidebar-minimizer').data('state', 1);
		$('body').toggleClass('sidebar-minimized');
		resizeBroadcast();
		$('body').toggleClass('brand-minimized');
	}
	// sidebar state
	$('.sidebar-toggler').click(function(){
		$(this).data('state', ($(this).data('state') == 0 ? 1 : 0));
		Cookies.set('sidebarh', $(this).data('state'));
	});
	if(Cookies.get('sidebarh') == 1) {
		$('.sidebar-toggler').data('state', 1);
		$('body').toggleClass('sidebar-hidden');
		resizeBroadcast();
	}
	// aside state
	$('.aside-menu-toggler').click(function(){
		$(this).data('state', ($(this).data('state') == 0 ? 1 : 0));
		Cookies.set('asideh', $(this).data('state'));
	});
	if(Cookies.get('asideh') == 1) {
		$('.aside-menu-toggler').data('state', 1);
		$('body').toggleClass('aside-menu-hidden');
		resizeBroadcast();
	}
	// aside tab
	$('.aside-menu a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
		Cookies.set('asidetab', $(e.target).attr('href'));
	});
	if(Cookies.get('asidetab')) {
		$('.aside-menu a[href="' + Cookies.get('asidetab') + '"]').tab('show');
	}

    $('body').on('click','.modalbox',function(){
		let act = $(this).attr('data-box') + ($(this).attr('data-get') || '');
		$.get(cburl+'ajax?c=box&a='+act+STSI, function(data, status){
			var resp = JSON.parse (data);
			if(resp.e==0) {
				$('.modal-title').html(resp.title);
				$('.modal-body').html(resp.body);			
				(resp.action) ? $('.savebox').data('action',resp.action) : null;
				(resp.reloadw) ? $('.savebox').data('table',resp.reloadw) : null;
				(resp.head==0) ? $('div.modal-header').hide() : null;
				(resp.foot==0) ? $('div.modal-footer').hide() : null;
				(resp.header) ? $('div.modal-header').html(resp.header) : null;
				(resp.footer) ? $('div.modal-footer').html(resp.footer) : null;
				$('.modal-'+(resp.box || 'large')).modal('show');
			} else {
				notifa (
					'danger','fa fa-warning','<i class="icon-info"></i> Error',
					resp.e,
					7000,1,1
				);													
			}

		});
						

	});
	
	$('body').on('click','.savebox',function(){
        var TABLE=$(this).data('table');
        var disabled = $(".modal-form form").find(':input:disabled').removeAttr('disabled');
        let boxform = $(".modal-form form").serialize();
		let act = $('.savebox').data('action');
        $.get(cburl+'ajax?c='+act+'&'+boxform+STSI, function(data, status){
            var resp = JSON.parse (data);
            ajaxNotify (resp,'Update');
            $('#vw-'+TABLE).load(location.href + ' #v-'+TABLE);
        });
	});

    $('body').on('click','.do-setStatus',function(){
        var TABLE=$(this).data('table');
        var ID=$(this).attr('data-id');
        var STATUS= +$(this).prop('checked');
        var result = confirm('Are you sure to update (#'+ID+') ?');
        if (result) {
            $.get(cburl+'ajax?c=app&a=setStatus&table='+TABLE+'&id='+ID+'&status='+STATUS+STSI, function(data, status){
                var resp = JSON.parse (data);
                ajaxNotify (resp,'Update');
                $('#vw-'+TABLE).load(location.href + ' #v-'+TABLE);
            });
        }
    });

    $('body').on('click','.do-delete',function() {
        var TABLE=$(this).attr('data-table');
        var ID=$(this).attr('data-id');
        var NAME=$(this).attr('data-name');
        var result = confirm('Are you sure to delete '+NAME+' (#'+ID+') ?');
        if (result) {
            $.get(cburl+'ajax?c=app&a=delItem&table='+TABLE+'&id='+ID+'&name='+NAME+STSI, function(data, status){
                var resp = JSON.parse (data);
                ajaxNotify (resp,'Removed');
                $('#vw-'+TABLE).load(location.href + ' #v-'+TABLE);
            });
        }
    });

});
