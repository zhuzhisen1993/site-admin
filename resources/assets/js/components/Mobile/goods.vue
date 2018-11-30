<template>
  <div class="goods">
    <div class="nav">
      <div class="w">
        <a href="javascript:;" :class="{active:sortType===1}" @click="reset()">综合排序</a>
        <a href="javascript:;" @click="sortByPrice(1)" :class="{active:sortType===2}">价格从低到高</a>
        <a href="javascript:;" @click="sortByPrice(-1)" :class="{active:sortType===3}">价格从高到低</a>
        <div class="price-interval">
          <input type="number" class="input" placeholder="价格" v-model="min">
          <span style="margin: 0 5px"> - </span>
          <input type="number" placeholder="价格" v-model="max">
          <y-button text="确定" classStyle="main-btn" @btnClick="reset" style="margin-left: 10px;"></y-button>
        </div>
      </div>
    </div>

    <div v-loading="loading" element-loading-text="加载中..." style="min-height: 35vw;">
      <div class="img-item" v-if="!noResult">
        <!--商品-->
        <div class="goods-box w">
          <mall-goods v-for="(item,i) in goods" :key="i" :msg="item"></mall-goods>
        </div>

        <el-pagination
          v-if="!noResult&&!error"
          @size-change="handleSizeChange"
          @current-change="handleCurrentChange"
          :current-page="currentPage"
          :page-sizes="[5, 10, 15, 20]"
          :page-size="pageSize"
          layout="total, sizes, prev, pager, next, jumper"
          :total="total">
        </el-pagination>
      </div>
      <div class="no-info" v-if="noResult">
        <div class="no-data">
          <img src="/static/images/no-search.png">
          <br> 抱歉！暂时还没有商品
        </div>
        <section class="section">
          <y-shelf :title="recommendPanel.name">
            <div slot="content" class="recommend">
              <mall-goods :msg="item" v-for="(item,i) in recommendPanel.panelContents" :key="i"></mall-goods>
            </div>
          </y-shelf>
        </section>
      </div>
      <div class="no-info" v-if="error">
        <div class="no-data">
          <img src="/static/images/error.png">
          <br> 抱歉！出错了...
        </div>
        <section class="section">
          <y-shelf :title="recommendPanel.name">
            <div slot="content" class="recommend">
              <mall-goods :msg="item" v-for="(item,i) in recommendPanel.panelContents" :key="i"></mall-goods>
            </div>
          </y-shelf>
        </section>
      </div>
    </div>
  </div>
</template>
<script>
//   import { getAllGoods } from '/api/goods.js'
//   import { recommend } from '/api/index.js'
  import mallGoods from './Common/mallGoods'
  import YButton from './Common/YButton'
  import YShelf from './Common/shelf'
  export default {
      name:"goods",
    data () {
      return {
        goods: [
                            {
                                "productId": 150642571432852,
                                "salePrice": 499,
                                "productName": "FIIL Driifter 脖挂蓝牙耳机",
                                "subTitle": "全天佩戴 抬手就听 HEAC稳连技术",
                                "productImageBig": "https://resource.smartisan.com/resource/367d93db1d58f9f3505bc0ec18efaa44.jpg"
                            },
                            {
                                "productId": 150642571432851,
                                "salePrice": 2699,
                                "productName": "优点智能 E1 推拉式智能指纹密码锁",
                                "subTitle": "推拉一下，轻松开关",
                                "productImageBig": "https://resource.smartisan.com/resource/7ac3af5a92ad791c2b38bfe1e38ee334.jpg"
                            },
                            {
                                "productId": 150642571432850,
                                "salePrice": 199,
                                "productName": "ACIL E1 颈挂式蓝牙耳机",
                                "subTitle": "无感佩戴，一切变得简单",
                                "productImageBig": "https://resource.smartisan.com/resource/406eddef8808fa5a9be9594d07ef8643.jpg"
                            },
                            {
                                "productId": 150642571432849,
                                "salePrice": 9.9,
                                "productName": "Smartisan 明信片",
                                "subTitle": "优质卡纸、包装精致、色彩饱满",
                                "productImageBig": "https://resource.smartisan.com/resource/3973d009d182d8023bea6250b9a3959e.jpg"
                            },
                            {
                                "productId": 150642571432848,
                                "salePrice": 199,
                                "productName": "Smartisan 牛津纺衬衫",
                                "subTitle": "一件无拘无束的舒适衬衫",
                                "productImageBig": "https://resource.smartisan.com/resource/a1c53b5f12dd7ef790cadec0eaeaf466.jpg"
                            },
                            {
                                "productId": 150642571432847,
                                "salePrice": 249,
                                "productName": "Smartisan Polo衫 经典款",
                                "subTitle": "一件表里如一的舒适 POLO 衫",
                                "productImageBig": "https://resource.smartisan.com/resource/daa975651d6d700c0f886718c520ee19.jpg"
                            },
                            {
                                "productId": 150642571432846,
                                "salePrice": 149,
                                "productName": "Smartisan T恤 任天堂发售“红白机”",
                                "subTitle": "100% 美国 SUPIMA 棉、舒适拉绒质地",
                                "productImageBig": "https://resource.smartisan.com/resource/804edf579887b3e1fae4e20a379be5b5.png"
                            },
                            {
                                "productId": 150642571432845,
                                "salePrice": 199,
                                "productName": "Smartisan 帆布鞋",
                                "subTitle": "一双踏实、舒适的帆布鞋",
                                "productImageBig": "https://resource.smartisan.com/resource/2f9a0f5f3dedf0ed813622003f1b287b.jpg"
                            },
                            {
                                "productId": 150642571432844,
                                "salePrice": 2999,
                                "productName": "畅呼吸智能空气净化器超级除甲醛版",
                                "subTitle": "购新空净 赠价值 699 元活性炭滤芯",
                                "productImageBig": "https://resource.smartisan.com/resource/71432ad30288fb860a4389881069b874.png"
                            },
                            {
                                "productId": 150642571432843,
                                "salePrice": 1999,
                                "productName": "坚果 3",
                                "subTitle": "漂亮得不像实力派",
                                "productImageBig": "https://resource.smartisan.com/resource/718bcecced0df1cd23bbdb9cc1f70b7d.png"
                            },
                            {
                                "productId": 150642571432842,
                                "salePrice": 79,
                                "productName": "坚果 3 \"足迹\"背贴 乐高创始人出生",
                                "subTitle": "1891 年 4 月 7 日",
                                "productImageBig": "https://resource.smartisan.com/resource/abb6986430536cd9365352b434f3c568.jpg"
                            },
                            {
                                "productId": 150642571432841,
                                "salePrice": 49,
                                "productName": "坚果 3 TPU 软胶保护套",
                                "subTitle": "TPU 环保材质、完美贴合、周到防护",
                                "productImageBig": "https://resource.smartisan.com/resource/b899d9b82c4bc2710492a26af021d484.jpg"
                            },
                            {
                                "productId": 150642571432840,
                                "salePrice": 89,
                                "productName": "Smartisan 半入耳式耳机",
                                "subTitle": "经典配色、专业调音、高品质麦克风",
                                "productImageBig": "https://resource.smartisan.com/resource/9c1d958f10a811df841298d50e1ca7c0.jpg"
                            },
                            {
                                "productId": 150642571432839,
                                "salePrice": 29,
                                "productName": "坚果 3 TPU 软胶透明保护套",
                                "subTitle": "轻薄透明、完美贴合、TPU 环保材质",
                                "productImageBig": "https://resource.smartisan.com/resource/5e4b1feddb13639550849f12f6b2e202.jpg"
                            },
                            {
                                "productId": 150642571432838,
                                "salePrice": 79,
                                "productName": "坚果 3 绒布国旗保护套",
                                "subTitle": "质感精良、完美贴合、周到防护",
                                "productImageBig": "https://resource.smartisan.com/resource/63ea40e5c64db1c6b1d480c48fe01272.jpg"
                            },
                            {
                                "productId": 150642571432837,
                                "salePrice": 49,
                                "productName": "坚果 3 前屏钢化玻璃保护膜",
                                "subTitle": "超强透光率、耐刮花、防指纹",
                                "productImageBig": "https://resource.smartisan.com/resource/3a7522290397a9444d7355298248f197.jpg"
                            },
                            {
                                "productId": 150642571432836,
                                "salePrice": 149,
                                "productName": "Smartisan T恤 伍迪·艾伦出生",
                                "subTitle": "一件内外兼修的舒适T恤",
                                "productImageBig": "https://resource.smartisan.com/resource/f96f0879768bc317b74e7cf9e3d96884.jpg"
                            },
                            {
                                "productId": 816448,
                                "salePrice": 2799,
                                "productName": "极米无屏电视 CC",
                                "subTitle": "720P 高清分辨率、JBL 音响、两万毫安续航力",
                                "productImageBig": "http://image.smartisanos.cn/resource/41cb562a47d4831e199ed7e2057f3b61.jpg"
                            },
                            {
                                "productId": 738388,
                                "salePrice": 39,
                                "productName": "Smartisan 原装 Type-C 数据线",
                                "subTitle": "PTC 过温保护、凹形设计、TPE 环保材质",
                                "productImageBig": "http://image.smartisanos.cn/resource/c79a73ffc6f8e782160d978f49f543dc.jpg"
                            },
                            {
                                "productId": 691300,
                                "salePrice": 199,
                                "productName": "Smartisan 快充移动电源 10000mAh",
                                "subTitle": "10000mAh 双向快充、轻盈便携、高标准安全保护",
                                "productImageBig": "http://image.smartisanos.cn/resource/0540778097a009364f2dcbb8c5286451.jpg"
                            }
                        ],
        noResult: false,
        error: false,
        min: '',
        max: '',
        loading: false,
        timer: null,
        sortType: 1,
        windowHeight: null,
        windowWidth: null,
        recommendPanel: [],
        sort: '',
        currentPage: 1,
        total: 0,
        pageSize: 5
      }
    },
    methods: {
      handleSizeChange (val) {
        this.pageSize = val
        //this._getAllGoods()
        this.loading = true
      },
      handleCurrentChange (val) {
        this.currentPage = val
        //this._getAllGoods()
        this.loading = true
      },
    //   _getAllGoods () {
    //     let cid = this.$route.query.cid
    //     if (this.min !== '') {
    //       this.min = Math.floor(this.min)
    //     }
    //     if (this.max !== '') {
    //       this.max = Math.floor(this.max)
    //     }
    //     let params = {
    //       params: {
    //         page: this.currentPage,
    //         size: this.pageSize,
    //         sort: this.sort,
    //         priceGt: this.min,
    //         priceLte: this.max,
    //         cid: cid
    //       }
    //     }
    //     getAllGoods(params).then(res => {
    //       if (res.success === true) {
    //         this.total = res.result.total
    //         this.goods = res.result.data
    //         this.noResult = false
    //         if (this.total === 0) {
    //           this.noResult = true
    //         }
    //         this.error = false
    //       } else {
    //         this.error = true
    //       }
    //       this.loading = false
    //     })
    //   },
      // 默认排序
      reset () {
        this.sortType = 1
        this.sort = ''
        this.currentPage = 1
        this.loading = true
        //this._getAllGoods()
      },
      // 价格排序
      sortByPrice (v) {
        v === 1 ? this.sortType = 2 : this.sortType = 3
        this.sort = v
        this.currentPage = 1
        this.loading = true
        //this._getAllGoods()
      }
    },
    watch: {
      $route (to, from) {
        if (to.fullPath.indexOf('/goods?cid=') >= 0) {
          this.cId = to.query.cid
          //this._getAllGoods()
        }
      }
    },
    created () {
    },
    mounted () {
      this.windowHeight = window.innerHeight
      this.windowWidth = window.innerWidth
      //this._getAllGoods()
    //   recommend().then(res => {
    //     let data = res.result
    //     this.recommendPanel = data[0]
    //   })
    },
    components: {
      mallGoods,
      YButton,
      YShelf
    }
  }
</script>
<style lang="scss" rel="stylesheet/scss" scoped>
  %block-center {
  display: flex;
  align-items: center;
  justify-content: center;
}

@mixin wh($w,$h:$w) {
  width: $w;
  height: $h;
}

  // 主色
$main-col: #5079d9;
// 头部
$head-bgc: #1a1a1a;
// 字体颜色
$cc: #ccc;
$c6: #666;
$c9: #999;
$c3: #333;
$cf: #fff;



  .nav {
    height: 60px;
    line-height: 60px;
    > div {
      display: flex;
      align-items: center;
      a {
        padding: 0 15px;
        height: 100%;
        @extend %block-center;
        font-size: 12px;
        color: #999;
        &.active {
          color: #5683EA;
        }
        &:hover {
          color: #5683EA;
        }
      }
      input {
        @include wh(80px, 30px);
        border: 1px solid #ccc;
      }
      input + input {
        margin-left: 10px;
      }
    }
    .price-interval {
      padding: 0 15px;
      @extend %block-center;
      input[type=number] {
        border: 1px solid #ccc;
        text-align: center;
        background: none;
        border-radius: 5px;
      }
    }
  }

  .goods-box {
    > div {
      float: left;
      border: 1px solid #efefef;
    }
  }

  .no-info {
    padding: 100px 0;
    text-align: center;
    font-size: 30px;
    display: flex;
    flex-direction: column;
    .no-data{
      align-self: center;
    }
  }

  .img-item{
    display: flex;
    flex-direction: column;
  }

  .el-pagination{
    align-self: flex-end;
    margin: 3vw 10vw 2vw;
  }

  .section {
    padding-top: 8vw;
    margin-bottom: -5vw;
    width: 1218px;
    align-self: center;
  }

  .recommend {
    display: flex;
    > div {
      flex: 1;
      width: 25%;
    }
  }



</style>
