var inpDate = document.querySelectorAll('.date_pick_wrap');


if (inpDate) {
    inpDate.forEach(element => {

        var val = element.querySelector('.inputDatePic');
        if (val) {

            if (val.value > 0) {
                var timestamp = val.value;
                timestamp = timestamp * 1000;

                var date = new Date(timestamp);

                let dateTimeD = date.toISOString();

                let arDatD = dateTimeD.split('T');

                // console.log(arDatD[0]);

                var valOut = element.querySelector('.outDatePic');

                if (valOut) {
                    valOut.value = arDatD[0];
                }
            }

            var valOut = element.querySelector('.outDatePic');
            if (valOut) {

                valOut.addEventListener("change", (event) => {
                    var date = new Date(valOut.value);
                    let timestamp = date.getTime() / 1000;
                    // console.log(date.getTime());

                    val.value = timestamp;
                });

            }
        }


    });
}
