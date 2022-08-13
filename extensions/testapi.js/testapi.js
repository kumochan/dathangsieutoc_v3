$("#submitButton").click(function (e) {
$.ajax({
type: "POST",
url: "http://api.openweathermap.org/data/2.5/group?id=2643741,2644688,2633352,2654675,2988507,2990969,2911298,2925535,2950159,3120501,3128760,5128581,4140963,4930956,5106834,5391959,5368361,5809844,4099974,4440906&appid=de6d52c2ebb7b1398526329875a49c57&units=metric",
dataType: "json",
success: function (result, status, xhr) {
//code
});
},
error: function (xhr, status, error) {
alert("Error: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
}