$(document).ready(function(){

	blog_list_more();
});

function blog_list_more()
{
	var btn = $('#blog-list-more');
	if(btn.length == 0)
		return;

	var block_list = btn.parent();
	var count = btn.data('count') * 1;
	var limit = btn.data('limit') * 1;
	var current = btn.data('current') * 1;
	var tag = btn.data('tag');
	var search = btn.data('search');
	var tpl = $('#blog-list-item-tpl').html();

	btn.on('click', function(){
		
		if(current >= count)
		{
			btn.hide();
			return;
		}

		$.ajax({
			dataType: 'json',
			method: 'POST',
			url: '/app/ajax-blog-list/',
			data: {
				limit: limit,
				offset: current,
				tag: tag,
				search: search
			},
			success: function(data){
				
				//console.log('success', data);
				if(data.items == false)
				{
					btn.hide();
					return;
				}

				var html = '';
				$.each(data.items, function(i, v){
					html = tpl;
					html = html.replace(/{IMG}/g, v.img);
					html = html.replace(/{TITLE}/g, v.name);
					html = html.replace(/{DESCRIPTION}/g, v.short_description);
					html = html.replace(/{DATE}/g, v.ts);
					html = html.replace(/{ID}/g, v.id);
					html = html.replace(/{COUNTER}/g, v.counter);

					var tags = '';
					v.tags.forEach(function(item, i, arr){
						if(item.length >= 3)
						{
							tags += '<a href="/?tag=' + item + '" class="text-dark tag">' + item + '</a>';
						}
					});
	
					html = html.replace(/{TAGS}/g, tags);
					
					block_list.before(html);
				});
				
				current += limit;

				if(current >= count)
				{
					btn.hide();
					return;
				}
	
			},
			error: function(data){
				console.log('error', data);
			}
		});
	});
}