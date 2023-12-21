$(document).ready(function() {
            $('#hall').on('change', function() {
                        var selectedValue = $(this).val();
                        console.log(selectedValue);
                        $.ajax({
                                    url: '/get-movie/' + selectedValue,
                                    type: 'GET',
                                    success: function(data) {
                                            console.log(data);
                                            var isEmailVerified = data.isEmailVerified;
                                            console.log(isEmailVerified);
                                            // Clear previous content before appending new items
                                            $('#poster').empty();
                                            $('#trailer').empty();
                                            $('#list').empty();

                                            $.each(data.movies, function(key, item) {


                                                        // Poster
                                                        $('#poster').append(`
                        <div class="swiper-slide pb-40px" style="background: linear-gradient(to left, rgba(0, 0, 0, 0.85), rgba(0, 0, 0,0.75)), url('uploadimage/${item.poster}'); background-repeat: no-repeat; background-size: cover; width: 1500px; height: 550px;">
                            <div class="flex">
                                <div><img src="uploadimage/${item.poster}"/></div>
                                <div class="mt-[70px] ml-[10px] md:ml-[50px]">
                                    <p class="text-orange-500 text-3xl font-mono font-semibold">${item.name}</p>
                                    <p class="text-white font-mono text-[18px]  mb-3"><span class="font-semibold text-[20px]">Cast : </span>${item.cast}</p>
                                    <p class="text-white font-mono text-[18px]  mb-3"><span class="font-semibold text-[20px]">Singer : </span>${item.singer}</p>
                                    <p class="text-white font-mono text-[18px]  mb-3 "><span class="font-semibold text-[20px]">Director : </span>${item.director}</p>
                                    <p class="text-white font-mono text-[15px] md:text-[18px] mb-3 md:w-[450px] w-[400px] "><span class="font-semibold text-[20px]">Description </span>${item.description}</p>
                                    <p class="text-white font-mono text-[18px]  mb-3"><span class="font-semibold text-[20px]">Price : </span>${item.price} <span>Show Time :${item.show_time}</span></p>
                                    <p class="text-white font-mono text-[18px]  mb-3"><span class="font-semibold text-[20px]">Hall Name: </span>
                                    ${item.hall?item.hall.name:""};</p> 
                                    
                                    ${isEmailVerified ? ` <a href="/ticket/${item.id}" class="btn bg-red-500 px-5 py-3 rounded-md  text-white text-center font-mono text-[19px]">Buy Ticket</a>` : `<p class="text-white mb-2 bg-red-500 px-1 py-3 rounded-md">Email is not verified</p>`}

                               
                                   
                                </div>
                            </div>
                        </div>
                    `)
                });
                //user


                // List
                $.each(data.all_movies, function(key, item) {
                    $('#list').append(`
                        <div class="swiper-slide">
                            <img src="uploadimage/${item.poster}" />
                            <div class="items-center card h-[200px] -mt-[200px]">
                                <p class="text-xl text-white -mt-26">Price: ${item.price}.</p>
                                <p class="text-xl text-white -mt-26"> ${item.hall?item.hall.name:""}</p>
                                </div>
                        </div>
                    `);
                });

                // Trailers
                $.each(data.trailers, function(key, item) {
                    $('#trailer').append(`<div class="swiper-slide">${item.link}</div>`);
                });



            },
        });
    })
});