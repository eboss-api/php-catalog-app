jQuery(function($) {
	
	if(window.parent) {
		var targetHeight = document.documentElement ? document.documentElement.scrollHeight : document.body.scrollHeight;
		window.parent.postMessage("resizeIframe:"+targetHeight,"*");
	}
	
	/*
	$(".bundle_download.action_button").on("click", function(e) {
		e.preventDefault();
		if(window.self===window.top) {
			$('#DownloadModal').modal().find("iframe").attr("src", $(this).attr("href"));
		} else {
			window.open($(this).attr("href"),"EbossDownloader","width=1015,height:800,scrollbars=yes");
		}
	});
	*/

	$("a.toggle_downloader").on("click", function(e) {
		e.preventDefault();
		var url = "?action=downloads"+
			"&product_id="+$(this).data("productid")+
			"&section="+$(this).data("section");

		window.open(url,"_blank","width=1015,height=800,scrollbars=yes");
		/*
		if(window.self===window.top) {
			$('#DownloadModal').modal().find("iframe").attr("src", url);
		} else {
			window.open(url,"EbossDownloader","width=1015,height:800,scrollbars=yes");
		}
		*/
	});

	$("#Downloads .file.extension_pdf a").on("click", function(e) {
		e.preventDefault();
		window.open($(this).attr("href"),"_blank","width=960,height=760,scrollbars=yes");
	});

	$("#Downloads a.preview").on("click", function(e) {
		e.preventDefault();
		window.open($(this).attr("href"),"_blank","width=840,height=480,scrollbars=yes");
	});

	$("a[data-toggle='popover']").popover({
		trigger: 'manual',
	}).click(function(evt) {
		evt.stopPropagation();
		$(this).popover('show');
	});

	$('html').click(function() {
		$("a[data-toggle='popover']").popover('hide');
	});


	$.fn.checkboxToggleGroup = function() {
		$(this).on("change", function() {
			var toggleField = $(this);
			var checkBoxes = $(this).closest(".accordion-inner").find("input.checkbox").not(toggleField);
			checkBoxes.prop("checked", $(toggleField).prop("checked"));
		});
	};

	$("input.checkbox.toggle-group").checkboxToggleGroup();


	$(".checkbox.toggle-extension").on("change", function(e) {
		var extension = $(this).data("extension");
		var toggleField = $(this);
		var checkBoxes = $(this)
			.closest(".accordion-inner")
			.find("input."+extension)
			.not(toggleField);

		checkBoxes.prop("checked", $(toggleField).prop("checked"));
	});

	$("#ProductSelect").select2({
		placeholder: "Choose a product",
		width: "resolve"
	});

	$("body").on("change", "#ProductSelect", function() {
		$(this).closest("form").submit();
	});

	$("#CategoriesRangesSelect").select2({
		allowClear: true,
		placeholder: "Choose a category or range",
		width: "resolve"
	});

	$("body").on("change", "#CategoriesRangesSelect", function() {
		var form = $(this).closest("form");
		$("#ProductSelect").load(form.attr("action")+" #ProductSelect>*", form.serialize());
	});

});
