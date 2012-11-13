var apiUrl = '/api.php';
function getLastPosition(callbackFunc)
{
	$.ajax({
  url: apiUrl,dataType:'json'
}).done(function(data) { 
  callbackFunc(data);
  
});
}