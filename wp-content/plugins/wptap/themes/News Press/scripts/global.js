function favPage()
{
    var pageName=window.location.href;
    var nameArr =pageName.split("?");
    pageName=nameArr[0] + "?" + nameArr[1];
    if (window.sidebar)
    {
        window.sidebar.addPanel(document.title,pageName,"");
    }
    else   if(  document.all )
    { 
        window.external.AddFavorite(pageName,document.title);
    }
    else
    {
        return   true;
    }
} 

jQuery(document).ready(function($) {
	//navigation 
	$('#search').click(function (){ $('.formsearch').toggle();return false;	});
	$('#login').click(function (){ $('.formlogin').toggle();return false;});
	$('#bookmark').click(function(){ $('#menubox').toggle();return false; });
	$('#pages').click(function (){ $('#pagesbox').toggle();return false;});
	$('#categories').click(function (){ $('#categoriesbox').toggle();return false;});
	$('#sbookmark').click(function (){ $('#sbookmarks').toggle();return false;});
	$('#sshare').click(function(){$('#shareul').toggle();return false;});
	
	
	//bookmark-it
	$('#bookmarkit').click(function(){
		var pageName=window.location.href;
		var nameArr =pageName.split("?");
		pageName=nameArr[0] + "?" + nameArr[1];

		if (window.sidebar){
			window.sidebar.addPanel(document.title,pageName,"");
		} else if(document.all){ 
			window.external.AddFavorite(pageName,document.title);
		} else if(navigator.userAgent.toLowerCase().indexOf('iphone')!=-1) {
			alert('please press the \'+\' button on your browser to bookmark this site.');
		} else if(navigator.userAgent.toLowerCase().indexOf('webkit')!=-1) {
			alert('please press ctrl + D to bookmark');
		} else {
			return true;
		}
	});
	
	//article extra
	$('.article').each(function (){
		var ele=$(this);
		ele.find('.extra').click(function(){
			$(this).toggleClass('selected');
			ele.find('.entry').toggle();
			return false;
		} );
	});
});
