
function modal(params) 
{
    document.getElementById(params).style.display = "flex"
}

function modalClose(params, modalOpen) 
{
    document.getElementById(params).style.display = "none" 
	if(modalOpen)
	{
        modal(modalOpen)
    }
}

function menuToggle(params) 
{
	if(params === "close")
	{
		document.querySelector('header').classList = ""
	}
	else
	{
		document.querySelector('header').classList = "mobileHeader"
	}
}

function scrollToTop(params) 
{
  	window.scrollTo({ top: window.innerHeight, left: 0, behavior: 'smooth' });
}
