
        function setCookie(cname,cvalue,exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function checkCookie() {
            var user=getCookie("username");
            if (user != "") {
                alert("Welcome again " + user);
            } else {
                user = prompt("Please enter your name:","");
                if (user != "" && user != null) {
                    setCookie("username", user, 30);
                }
            }
        }

        function deleteFavoriteBlog(idDelete) {
            var favoriteBlogs = getCookie("favoriteBlogs");
            if (favoriteBlogs && Array.isArray(JSON.parse(favoriteBlogs))) {
                let ss = JSON.parse(favoriteBlogs);
                ss.splice(idDelete,1);
                setCookie("favoriteBlogs", JSON.stringify(ss),1);
                showListFavoriteBlog();

            }
        }

        function showListFavoriteBlog() {
            var favoriteBlogs = getCookie("favoriteBlogs");
            let html = '';
            if (favoriteBlogs && Array.isArray(JSON.parse(favoriteBlogs))) {
                JSON.parse(favoriteBlogs).map((item, index) => {
                    html += '<tr><td>'+item+'</td><td><button type="button" class="btn btn-danger fa fa-trash" id="btnDeleteFavoriteBlog" onclick={deleteFavoriteBlog('+index+')} data-id="'+index+'"></button></td></tr>';
                })
            }
            $('#listFavoriteBlog').html(html);
        }
        $(document).ready(function(){
            showListFavoriteBlog();

            $('#btnAddFavoriteBlog').on("click", () => {
                let favoriteBlog = $('#inputFavoriteBlog').val();
                if (favoriteBlog !== "") {
                    console.log(favoriteBlog);
                    $('#inputFavoriteBlog').val("");
                    var favoriteBlogs = getCookie("favoriteBlogs");
                    if (favoriteBlogs && Array.isArray(JSON.parse(favoriteBlogs))) {
                        favoriteBlogs = JSON.parse(favoriteBlogs).concat([favoriteBlog])
                        setCookie("favoriteBlogs", JSON.stringify(favoriteBlogs),1);
                        showListFavoriteBlog();
                    } else {
                        setCookie("favoriteBlogs", JSON.stringify([favoriteBlog]),1);
                        showListFavoriteBlog();

                    }
                }
            })

            $('#btnResetFavoriteBlog').on("click", () => {
                setCookie("favoriteBlogs", "",0);
                showListFavoriteBlog();
            })

        });
