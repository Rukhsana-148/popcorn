$(document).ready(function() {
    $('#visit').on('change', function() {
        var selectedValue = $(this).val();
        console.log(selectedValue);
        $.ajax({
            url: '/get-hall/' + selectedValue,
            type: 'GET',
            success: function(data) {
                console.log(data);
                console.log(data.hall.name);


                // Clear previous content before appending new items
                $('#manager').empty();
                $('#movies').empty();
                $('#trailer').empty();
                $('#hall_info').empty();


                // hall
                $.each(data.hall, function(key, item) {
                    $('#hall_info').append(`
                    <p class="text-center text-5xl text-white pt-5 font-mono">${item.name}</p>
                    <p class="text-center text-[20px]  text-gray-300  font-mono">${item.location}</p>
                    <p class="text-center text-[20px]  text-gray-300  font-mono"></p>
          
                    `);
                })

                //manager
                $.each(data.manager, function(key, item) {
                    $('#manager').append(`
                    <p class="text-center text-[20px]  text-gray-300  font-mono">${item.email}</p>
  <p class="text-center text-[20px]  text-gray-300  font-mono">${item.phone}</p>`);
                });

                // List
                $.each(data.movies, function(key, item) {
                    $('#movies').append(`
                        <div class="swiper-slide">
                            <img src="uploadimage/${item.poster}" />
                            <div class="items-center card h-[200px] -mt-[200px]">
                                <p class="text-xl text-white -mt-26">Price: ${item.price}.</p>
                            </div>
                        </div>
                    `);
                });

                // Trailers
                console.log(data.trailers);
                $.each(data.trailers, function(key, item) {
                    $('#trailers').append(`
                        <div class="swiper-slide">
                            ${item.link}
                        </div>
                    `);
                });




            },
        });
    })
});