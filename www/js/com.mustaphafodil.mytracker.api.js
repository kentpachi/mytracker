var apiUrl = 'apiUrl';
function getLastPosition(callbackFunc)
{
	$.ajax({
  url: apiUrl,dataType:'json'
}).done(function(data) { 
  callbackFunc(data);
  
});
}
