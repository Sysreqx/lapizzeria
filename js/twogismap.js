function init_map() {
	var map;

	DG.then(function () {
		map = DG.map('map', {
			center: [43.239982, 76.904287],
			zoom: 13
		});
	});
}