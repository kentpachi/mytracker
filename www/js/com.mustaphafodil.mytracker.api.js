var apiUrl = 'http://mytracker.mustaphafodil.com/api.php';
function getLastPosition(callbackFunc)
{
	$.ajax({
  url: apiUrl,dataType:'json'
}).done(function(data) { 
  callbackFunc(data);
  
});
}