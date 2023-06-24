<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review | Cafe Alps</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS lainnya */

        /* CSS untuk tata letak zig-zag */
        .menu {
            margin-left: 230px;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            grid-gap: 20px 40px;
        }
        .heading {
            background-color: #8c6e4d;
            color: #ffffff;
            margin-bottom: 30px;
            padding: 120px 0 30px 0;
            grid-column: 1/-1;
            text-align: center;
        }
        .heading > h1 {
            margin-left: 10px;
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 10px;
            margin-bottom: 10px;
        }
        .heading > h3 {
            margin-left: 10px;
            font-weight: 600;
            font-size: 22px;
            letter-spacing: 5px;
        }
       
        /* CSS untuk review pelanggan */
        .customer-reviews {
            margin-top: 50px;
            margin-bottom: 50px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            overflow-x: scroll;
            scroll-snap-type: x mandatory;
        }
        .customer-card {
            flex: 0 0 250px;
            scroll-snap-align: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .customer-card img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .customer-card h5 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
        }
        .customer-card p {
            margin-top: 5px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
        .col-lg-auto {
          margin-left: 410px;
        }
    </style>
</head>

<body>
<div class="col-lg-auto">
        
    <div class="col-lg-3">
                <!-- Sidebar -->
                <aside class="sidebar">
                    <div class="logo">
                        <img src="gambar/Logo.png" alt="Cafe Alps Logo" width="500" height="200">
                    </div>
                    <center>
                        <ul>
                            <li><a href="dashboard.php">Home</a></li>
                            <li class="active"><a href="about.php">About Us</a></li>
                            <li><a href="review.php">Review</a></li>
                        </ul>
                    </center>
                    <div class="login">
                        <a href="login.php">Login</a>
                    </div>
                    <div class="address">
                        <p>Cafe Alps</p>
                        <p>Tenkaichi Street, Kamurocho</p>
                        <p>Chiyoda-ku, Tokyo 123-4567</p>
                        <p>Japan</p>
                    </div>
                </aside>
            </div>
                <!-- Content -->
                    <div class="heading">
                        <h1>CAFE ALPS</h1>
                        <h3>&mdash; Review &mdash;</h3>
                    </div>
                    
                    <!-- Card dengan foto besar -->
                    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="post-container">
                    <div class="post-header">
                        <img class="profile-pic" src="gambar/kiryu.png" alt="Customer 1">
                        <div>
                            <h5 class="mb-0">Kiryu Kazuma</h5>
                            <p class="text-muted">Dragon of Dojima</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/kiryupost.jpeg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">Went to take an evening meal at Cafe Alps... The coffee was strong enough to 
                            wake the dead, and the ambiance felt great. However, I couldn't help but notice
                            Majima-san trying to blend in as a waiter. Talk about unexpected surprises....</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/majima.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Goro Majima</span>
                                        Kiryu-chan, you're really into coffee these days, huh? Trying to become a coffee connoisseur now?
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/kiryu.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Kiryu Kazuma</span>
                                        Majima-san... always appearing out of nowhere!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
               <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/majima.png" alt="Customer 2">
                        <div>
                            <h5 class="mb-0">Goro Majima</h5>
                            <p class="text-muted">The Mad Dog of Shimano</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/majimapost.jpeg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">Hey folks! Guess who's moonlighting as a bartender at Cafe Alps? That's right, yours truly, 
                            Goro Majima!😎 While in disguise, I couldn't resist trying out their special Neapolitan dish, 
                            a personal favorite of mine. Talk about a blast!</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/saejima.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Taiga Saejima</span>
                                        Hahaha! Majima, you never fail to entertain us with your crazy antics. 
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/kiryu.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Kiryu Kazuma</span>
                                        Saejima-san, stop.. you're just encouraging him. 
                                        We both know he's just using this as an excuse to jump on me again...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/akiyama.png" alt="Customer 3">
                        <div>
                            <h5 class="mb-0">Shun Akiyama</h5>
                            <p class="text-muted">The Lifeline of Kamurocho</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/akiyamapost.jpeg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">Hey, everyone! Just having a great time at Cafe Alps. This place is a perfect place to relax and recharge. 
                            A hidden gem in the bustling city. I can't recommend it enough!</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/shinada.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Tatsuo Shinada</span>
                                        Akiyama, why is the picture all blurry? 
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/akiyama.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Shun Akiyama</span>
                                        Good eye, Shinada. Well about that...
                                    </p>
                                </div>
                            </div>
                             <div class="comment">
                                <img class="comment-avatar" src="gambar/hana.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Hana</span>
                                        Senchou! where are you now?! I saw you took a selfie at Cafe Alps a while ago then you 
                                        just ran away. I can't believe you're out having fun while I'm stuck here dealing with your mess.
                                         You better have a good explanation!!!
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/hana.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Hana</span>
                                        HEY SENCHOU!!!!?!?
                                    </p>
                        </div></div></div>
                    </div>
                </div>
                
            </div><div class="col-md-6">
                <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/ichiban.png" alt="Customer 4">
                        <div>
                            <h5 class="mb-0">Ichiban Kasuga</h5>
                            <p class="text-muted">Hero like No Other</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/ichibanpost.jpeg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">Wassupp internettt!! Took a stroll at Tenkaichi Street and found this amazing cafe 
                            called Cafe Alps. Their Earl Green Tea is out of this world, and the pasta is simply divine! Highly recommend it!😄😄</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/adachi.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Koichi Adachi</span>
                                        Ichi, why are you dressed like a knight? Haha! Did you forgot today we have normal clothes? 
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/nanba.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Yu Nanba</span>
                                        Ichi.. Are you searching for the legendary pasta treasure or something? lmaoo💀💀
                                    </p>
                                </div>
                            </div>
                             <div class="comment">
                                <img class="comment-avatar" src="gambar/saeko.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Saeko Mukouda</span>
                                         HAHAHA Are you planning to save the pasta from any culinary disasters? Maybe rescue some flavorless dishes?
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/ichiban.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Ichiban Kasuga</span>
                                        shut up u guys...
                                    </p>
                        </div></div></div>
                    </div>
                </div>
                
            </div><div class="col-md-6">
                <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/saejima.png" alt="Customer 5">
                        <div>
                            <h5 class="mb-0">Taiga Saejima</h5>
                            <p class="text-muted">The Tiger of Tojo Clan</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/saejimapost.jpeg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">Just had an amazing time at Cafe Alps branch in Tsukimino. The food was delicious, 
                            the atmosphere was cozy, and the service was top-notch.</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/majima.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Goro Majima</span>
                                        Kyodai, I bet you ate everything on the menu, didn't you? Leave some for the rest of us, will ya?
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/haruka.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Sawamura Haruka</span>
                                        Saejima-san, did you manage to eat as much as Uncle Kaz? 😄
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/kiryu.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Kiryu Kazuma</span>
                                        Haruka.. please don't say that....
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
                </div>
            </div><div class="col-md-6">
                <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/shinada.png" alt="Customer 6">
                        <div>
                            <h5 class="mb-0">Tatsuo Shinada</h5>
                            <p class="text-muted">Former Baseball Star</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/shinadapost.jpeg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">I've tasted victory on the baseball field, but the taste of Cafe Alps'
                             blended coffee is on another level. The rich aroma and smooth flavor bring back memories
                              of my glory days. I can't resist coming back for more!</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/akiyama.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Shun Akiyama</span>
                                        If you think that's good, you should definitely give Cafe Alps' Blue Mountain coffee a try. 
                                         Trust me, you won't be disappointed.
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/daigo.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Daigo Dojima</span>
                                        Interesting.. I'll have to visit Cafe Alps soon and experience this coffee sensation myself
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/tanimura.png" alt="Customer 6">
                        <div>
                            <h5 class="mb-0">Masayoshi Tanimura</h5>
                            <p class="text-muted">Police Detective</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/tanimurapost.jpeg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">I had the most soothing and tranquil experience at Cafe Alps. The atmosphere was so peaceful,
                             and I felt all my stress melt away. Highly recommend it for some chill vibes! 😌🍃</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/akiyama.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Shun Akiyama</span>
                                        After experiencing those "peaceful vibes at Cafe Alps", how about we continue with 
                                        a thrilling game of mahjong? Are you up for it? loser pays the check 😄
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/tanimura.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Masayoshi Tanimura</span>
                                        You're on! Consider it a Mahjong showdown at Cafe Alps. We could bring 
                                        Kiryu-san and Saejima-san to join on us too
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/saejima.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Taiga Saejima</span>
                                        Sorry, but i don't know how to play one. Never really liked table games stuff like those,
                                        especially chess.....
                                    </p>
                                </div>
                            </div> <div class="comment">
                                <img class="comment-avatar" src="gambar/kiryu.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Kiryu Kazuma</span>
                                        Don't worry, Saejima-san.. I could teach you a bit of this and that.. used to play
                                        with haruka back in onomichi..
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div><div class="col-md-6">
                <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/yagami.png" alt="Customer 6">
                        <div>
                            <h5 class="mb-0">Takayuki Yagami</h5>
                            <p class="text-muted">Director of the Yagami Detective Agency</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/yagamipost.jpeg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">Me and Kaito-san just discovered the most incredible flavor combo at Cafe Alps in Shofukocho, 
                            Sotenbori! Their blended coffee and curry combination is a taste sensation like no other. But we had to leave
                            before i finisihed the drink </p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/ichiban.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Ichiban Kasuga</span>
                                        Why did you stop midway? Did something bad happen?
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/yagami.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Takayuki Yagami</span>
                                        Well... It's mainly because "someone" caused a small scene at the cafe that got us kicked out.
                                        RiGhT KaItO MaSaHaRu-sAn?
                                    </p>
                                </div>
                            </div><div class="comment">
                                <img class="comment-avatar" src="gambar/kaito.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Masaharu Kaito</span>
                                        That ain't me Tak, it is definitely their fault for selling stuffs like those at a cafe. In fact,
                                        we should have called the police as well.
                                    </p>
                                </div></div>
                                <div class="comment">
                                <img class="comment-avatar" src="gambar/yagami.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Takayuki Yagami</span>
                                        IT'S JUST THE NAME FOR THE FOOD NOT LITERALLY
                                    </p>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div><div class="col-md-6">
                <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/kaito.png" alt="Customer 6">
                        <div>
                            <h5 class="mb-0">Masaharu Kaito</h5>
                            <p class="text-muted">Private investigator at Yagami Detective Agency</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/kaitopost.jpg" alt="Post Image">
                    <br>
                    <div class="review-rating">
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star-half-alt"></i>
    <i class="far fa-star"></i>
</div>
                    <div class="post-content">
                        <p class="text-justify">Warning, folks! Cafe Alps in Shofukocho, Sotenbori is serving some seriously twisted stuff man! I mean,
                             who in their right mind would sell 'Lady Fingers'??? Sounds like they're offering real human fingers as a food! 
                             Can someone explain this madness?? Giving it a 3 and a half star because they served really good curry</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/yagami.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Takayuki Yagami</span>
                                        Kaito-san, how many times should i tell you? you've got it all mixed up! 
                                        'Lady Fingers' are actually cookies, not actual fingers. 
                                        It's just a weird name for a sweet treat
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                            <img class="comment-avatar" src="gambar/kaito.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Masaharu Kaito</span>
                                        YAGAMI, I can't believe you're defending this madness! I saw it with my own eyes. 
                                        They had a whole platter of 'Lady Fingers' on display. It's like something out of a horror movie!
                                         I won't rest until I uncover the truth!
                                    </p>
                                </div>
                            </div><div class="comment">
                            <img class="comment-avatar" src="gambar/yagami.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Takayuki Yagami</span>
                                        Kaito-san, trust me, it's a harmless dessert. The name might be misleading, 
                                        but it's just a playful twist. I've had them before
                                    </p>
                                </div>
                            </div>
                                <div class="comment">
                                <img class="comment-avatar" src="gambar/kaito.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Masaharu Kaito</span>
                                        You enjoy your so-called 'Lady Fingers,' Tak. But when I expose the truth,
                                         you'll owe me a plate of those innocent, non-human, definitely-not-finger-like cookies!
                                    </p>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div><div class="col-md-6">
                <div class="post-container">
                    <div class="post-header">
                    <img class="profile-pic" src="gambar/haruka.png" alt="Customer 6">
                        <div>
                            <h5 class="mb-0">Sawamura Haruka</h5>
                            <p class="text-muted">Idol</p>
                        </div>
                    </div>
                    <img class="post-image" src="review/harukapost.jpg" alt="Post Image">
                    <br>
                    <div class="review-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        </div>
                    <div class="post-content">
                        <p class="text-justify">Just finished a long day of idol work, and now it's time to unwind at Cafe Alps in Sotenbori! 
                            Enjoying my favorite treat, a delicious Strawberry Parfait. 🍓💕 The atmosphere here is so calming, perfect for 
                            some much-needed relaxation. Though, there's a bit of a commotion happening near the cashier... something about 
                            'Lady Fingers'?🤔 Well, I'll just focus on enjoying my dessert and relaxing!</p>
                    </div>
                    <div class="post-footer">
                        <div class="post-comments">
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/kiryu.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Kiryu Kazuma</span>
                                        Great job on your idol work.. Take some time for yourself and recharge.. 😊🌟
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <img class="comment-avatar" src="gambar/haruka.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Sawamura Haruka</span>
                                        Thank you, Uncle kaz! Your words mean a lot to me 😄😄
                                    </p>
                                </div>
                            </div><div class="comment">
                            <img class="comment-avatar" src="gambar/kaito.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Masaharu Kaito</span>
                                        YOUNG LADY BE CAREFUL, DO NOT BUY THE LADY FINGERS FROM CAFE ALPS IN SOTENBORI. 
                                        Trust me, I've seen things. Don't eat it! Stay safe!
                                    </p>
                                </div>
                            </div><div class="comment">
                            <img class="comment-avatar" src="gambar/yagami.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Takayuki Yagami</span>
                                        Kaito-san, for god's sake! 'Lady Fingers' are simply cookies,
                                         not literal severed fingers. Please don't barge in on people comments like that.
                                    </p>
                                </div>
                            </div>
                                <div class="comment">
                                <img class="comment-avatar" src="gambar/kaito.png" alt="Comment Avatar">
                                <div>
                                    <p class="comment-text">
                                        <span class="comment-author">Masaharu Kaito</span>
                                        Tak, you're just trying to hide the truth!  You'll thank me when you realize the 
                                        danger lurking behind those innocent-sounding treats. 
                                    </p>
                        </div>
                    </div>
                </div>
                </div></div></div>
            </div>
        </div>
    </div>

    
    <footer class="footer">
    <div class="footer-content">
    <div class="footer-section about">
    <h3>About Us</h3>
   <p>Whether you're catching up with friends, having a business meeting, or simply enjoying a cup of coffee alone, Cafe Alps is the perfect place to relax and unwind.</p>
</div>
        <div class="footer-section social">
            <h3>Contact Us</h3>
             <p>Phone: 123-456-7890</p>
            <p>Email: info@cafealps.com</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
            <div class="footer-section contact">
            <h3>Our Branch</h3>
            <p>Tenkaichi Street, Kamurocho</p>
            <p>Fukuhaku Street, Nagasuga</p>
            <p>Shofukocho, Sotenbori</p>
            <p>Chuo Station Blvd, Tsukimino</p>
            <p>Noriko Street, Kineicho</p>
        </div>
        </div>
    </div>
    
    <script>
  window.addEventListener('scroll', function() {
    var sidebar = document.querySelector('.sidebar');
    var footer = document.querySelector('.footer');

    var isBottomVisible = window.innerHeight >= document.documentElement.scrollHeight - footer.offsetHeight;
    if (isBottomVisible) {
      sidebar.classList.add('hidden');
    } else {
      sidebar.classList.remove('hidden');
    }
  });
</script>
    </footer>
</body>
</html>
