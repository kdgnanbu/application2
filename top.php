<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>ShoppingCart</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:400,500" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
</head>

<body>

    <div class="posision" style=" margin-left:20%;">
        <h1 class="title">着物着せ替え</h1>
    </div>

    <div id="app" class="container">

    <div class="cart">
    <label>
    <span style="background-image:url(cart.png);height:60px;width:60px;background-color:white;margin-left:86%;background-size:cover;margin-top:5%"></span>
    <input type="checkbox" name="checkbox">
    <div id="popup">
     <div class="cart">
        <div class="summary">
          <table class="table table-cart">
            <tr>
              <th class="" colspan="4"><i class="fas fa-shopping-cart"></i>ショッピングカート</th>
            </tr>
            <tr v-for="(item, index) in cartItems">
              <td>{{item.title}}</td>
              <td>{{item.qty}}点</td>
              <td>{{item.price | formatCurrency}}</td>
              <td>
                <a href="#" @click.stop.prevent="remove(index)"><i class="fas fa-times-circle"></i>削除</a>
              </td>
            </tr>
            <tr v-for="(item1, index) in cartItems1">
              <td>{{item1.title1}}</td>
              <td>{{item1.qty1}}点</td>
              <td>{{item1.price1 | formatCurrency}}</td>
              <td>
                <a href="#" @click.stop.prevent="remove(index)"><i class="fas fa-times-circle"></i>削除</a>
              </td>
            </tr>
            <tr>
              <td colspan="2">合計</td>
              <td colspan="2">{{total | formatCurrency}}</td>
            </tr>
          </table>
        </div>
      </div><!-- カート --> 
    </div><!--popup-->
</label>
</div ><!--cart-->

    <div id="kisekae-area">
        <img class="base-img" src="base1.PNG">
    </div>

 
    <div class="flex-container">
        <!-- タブ -->
    <div class="tab-area" style="height:150px;background-color:#e5e2df; color:black;">
    <div class="tab active">
        <div style=" color:black;">着物</div>
        <div style=" background-image:url(kimono.jpg);height:120px;color:black;background-size:cover;"></div>
    </div>
    <div class="tab">
        <div style=" color:black;">帯</div>
        <div style=" background-image:url(obi.jpg);height:120px;color:black;background-size:cover;"></div>
    </div>
    <div class="tab">
        <div style=" color:black;">靴</div>
        <div style=" background-image:url(shoes.jpg);height:120px;color:black;background-size:cover;"></div>
    </div>
</div>
      <!-- タブ１ -->
    <div class="flex-item">

      <div class="content-area" style="padding-top:20px;">
      <div class="content show" style="padding-top:10px;">
      <div class="row" v-for="item in moreitems">
          <div class="contents">
            <div class="select-img">
              <img :src="item.image_cut" alt="">
              <img :src="item.image" alt="">
            </div>
            <div>{{item.title}}</div>
            <div>{{item.price}}</div>
            <input v-model="item.qty" type="number" min="1" />
            <button @click="addToCart(item)" class="button button-outline">カートに入れる</button>
          </div>
        </div>
  </div>
    <!-- タブ２ -->
  <div class="content">
 
  <div class="row" v-for="item in moreitems1">
  <div class="contents">
            <div class="select-img">
              <img :src="item.image_cut" alt="">
              <img :src="item.image" alt="">
            </div>
            <div>{{item.title}}</div>
            <div>{{item.price}}</div>
            <input v-model="item.qty" type="number" min="1" />
            <button @click="addToCart(item)" class="button button-outline">カートに入れる</button>
          </div>
        </div>
      </div>
  </div>
      <!-- タブ３ -->
  <div class="content">
      
  <div class="row" v-for="item in moreitems2">
          <div class="contents">
            <div class="select-img">
              <img :src="item.image_cut" alt="">
              <img :src="item.image" alt="">
            </div>
            <div>{{item.title}}</div>
            <div>{{item.price}}</div>
            <input v-model="item.qty" type="number" min="1" />
            <button @click="addToCart(item)" class="button button-outline">カートに入れる</button>
          </div>
        </div>
      </div>

</div><!--content-area-->

      </div>
  </div>




  


<!-- ショッピングカート -->
  <script>
    const products = [
      { ids: '1', id: 1, title: '着物1', price: 500000, qty: 1, image: 'item1.PNG', image_cut: 'item1_cut.png'},
      { ids: '1', id: 1, title: '着物2', price: 570000, qty: 1, image: 'item2.PNG', image_cut: 'item2_cut.png' },
      { ids: '2', id: 2, title: '帯1', price: 35000, qty: 1, image: 'item3.PNG' , image_cut: 'item3_cut.png'},
      { ids: '2', id: 2, title: '帯2', price: 20000, qty: 1, image: 'item4.PNG' , image_cut: 'item4_cut.png'},
      { ids: '3', id: 3, title: '靴1', price: 15000, qty: 1, image: 'item5.PNG' , image_cut: 'item5_cut.png'},
    ];

  
    const targetList = products.filter((no) => {
    return (no.ids === '1');
});
const targetList1 = products.filter((no1) => {
    return (no1.ids === '2');
});
const targetList2 = products.filter((no2) => {
    return (no2.ids === '3');
});



    // カンマ区切り
    Vue.filter('formatCurrency', function (value) {
      return '¥' + String(value).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    });
    
    var vm = new Vue({
      el: '#app',
      data: {
        cartItems: [], //カート追加済みの商品
        items: products, //商品一覧
        moreitems: targetList, //id1の商品
        moreitems1: targetList1,
        moreitems2: targetList2,
      },
      computed: {
        total: function () {
          let total = 0;
          this.cartItems.forEach(item => {
            total += (item.price * item.qty );
          });
          return total;
        },
      },
      methods: {
        // カートに追加
        addToCart(itemToAdd) {
          let existence = false;
          this.cartItems.forEach(item => {
            // すでにカートに追加済みの場合は価格を加算
            // if (item.id === itemToAdd.id) {
            //   existence = true;
            //   item.qty += Number(itemToAdd.qty);
            // }
          });
          // 新規商品の場合は商品を追加
          if (existence === false) {
            this.cartItems.push(Vue.util.extend({}, itemToAdd));
          };
          itemToAdd.qty = 1;
        },
        // カートから削除
        remove(index) {
          this.cartItems.splice(index, 1)
        }
      }
     }) 
  </script>


<!-- 画像切り替え -->
<script>
        jQuery(function($) {
            // 画像エリアクリックイベント
            $('.select-img').on('click', function() {
                $(this).toggleClass('selected');
                change_img();
            });
            // 画像変更処理
            function change_img() {
                var s_html = '';
                var i_z_index = 1;
                $('.select-img.selected').each(function(index, element) {
                    s_html += '<img src="' + $(element).find('img').eq(1).attr('src') + '" style="z-index:' + i_z_index + '">';
                    i_z_index++;
                });
                // 要素削除
                $('#kisekae-area img').each(function(index, element) {
                    if (!$(this).hasClass('base-img')) {
                        $(this).remove();
                    }
                });
                // 要素追加
                $('#kisekae-area').append(s_html);
            }
        });
    </script>


<!--    タブ切り替え-->
<script>
    $(function() {
        let tabs = $(".tab"); // 変数tabsに配列で定義
        $(".tab").on("click", function() { 
            $(".active").removeClass("active"); //前のactiveクラス削除
            $(this).addClass("active"); // activeクラス追加
            const index = tabs.index(this); // クリックした箇所がタブの何番目か判定し、定数indexとして定義
            $(".content").removeClass("show").eq(index).addClass("show"); // showクラスを消して、contentクラスのindex番目にshowクラスを追加
        })
    })
</script>


</body>
</html>



<style>
  /* .flex-container {
    display: flex;
  }
  .cart {
    flex-grow: 1;
    margin: 20px;
    position: relative;
  }
  .summary {
    background-color: #f6f6f6;
    position: fixed;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid #EDEDED;
    box-shadow: 1px 0 5px 4px rgba(85, 144, 184, 0.6);
    width: 400px;
  }

 
  .table-cart > tr > td {
    vertical-align: middle !important;
  }

 */

.contents {
    display: flex;
    justify-content: space-between;
    border-top: 1px gray solid;
    /* border-bottom: 1px gray solid; */
    padding: 10px;
  }

  .row{
    display: block;
    margin: 10px;
    width: 100%;
  }


  .flex-item{
    padding: 10px;
    border-radius: 10px;
  }
 
  /* .contents *:nth-child(1){
    width: 130px;
    height: 150px;
  } */
  .contents *:nth-child(2){
    width: 120px;
  }
  .contents *:nth-child(3){
    width: 100px;
  }
  .contents *:nth-child(4){
    width: 70px;
  }


  /* .cart {
    flex-grow: 1;
    margin: 20px;
    position: relative;
  }
  .summary {
    background-color: #f6f6f6;
    position: fixed;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid #EDEDED;
    box-shadow: 1px 0 5px 4px rgba(85, 144, 184, 0.6);
    width: 400px;
  }

  .table-cart > tr > td {
    vertical-align: middle !important;
  } */



/*タブ*/
.tab-area {
    margin-left:7px;
    margin-right:7px;
  display: flex;
  justify-content: space-around;
  background-color: #4682b4;
  cursor: pointer;

}
  .tab {
    width: 100%;
    height: 100%;
    line-height: 30px;
    text-align: center;
    color: white;
    border-right: 1px solid white;
    border-left: 1px solid white;
  }
  .tab.active {
    background-color: #b0c4de;
    color:black;
    border: none;

  }

.content-area {
    padding-top:10px;
     margin-left:7px;
    margin-right:7px;
}
  .content {
      padding-top:5px;
      padding-left:5px;
    display: none;
  }
  .content.show {
    height:100%;
    background-color:white;
    display: block;
  }




.select-img {
  border: solid 1px #000;
    text-align: center;
    padding: 10px;
    width: 20%;
    margin-right: 5px;
    cursor: pointer;
    height:300px;
}









/*着せ替え*/
#kisekae-area {
    border: solid;
    margin-top:7%;
    margin-bottom: 10px;
    text-align: center;
    position: relative;

}
#select-img-area {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.select-img {
    border: solid 1px #000;
    text-align: center;
    padding: 10px;
    width: 20%;
    margin-right: 5px;
    cursor: pointer;
    height:180px;
}
.select-img img {
    display: none;
}
.select-img img:first-child {
    display: inline-block;
}
.select-img:hover {
    background-color: #e6e6e6;
    opacity: 0.6;
}
.select-img.selected {
    background-color: #e6e6e6;
}
#kisekae-area img {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
}
#kisekae-area img.base-img {
    position: relative !important;
    top: auto;
    left: auto;
    transform: none;
    -webkit-transform: none;
    -ms-transform: none;
}

.title {
   position:absolute; top:10px;
}






/*ポップアップ*/

#popup{
  width:80%;
  line-height:80px;
  background-color:white;
  padding:0 4%;
  box-sizing:border-box;
  display:none;
  position:fixed;
  top:50%;
  left:50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
   border: solid;
   z-index: 5;
}

label{
  display:block;
}
label span{
  display:block;
  background-color:black;
  color:#fff;
  text-align:center;
}

input[type="checkbox"]{
  display:none;
}

input[type="checkbox"]:checked + #popup{
  display:block;
  transition:.2s;
}


input[type="checkbox"]:checked + #popup{
  display:block;
  transition:.2s;
}
  </style>