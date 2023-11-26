
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="public/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đơn hàng của tôi</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Đơn hàng của tôi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<section class="status_order">
        <div style="width: 900px;" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row-top_title">
                        <ul class="row-top_title-infor">
                            <li class="active">Tất cả</li>
                            <li>Chờ xác nhận</li>
                            <li>Đã xác nhận</li>
                            <li>Đang giao</li>
                            <li>Hoàn thành</li>
                        </ul>
                        <div class="line"></div>
                    </div>

                    <div class="row-top_content">
                        <div class="row-top_content_item active">
                            <div class="row-top_content_item_full">

                                <div class="row-top_content_item_row">
                                    <div class="infor_item-left">
                                        <img src="./upload/1700069121gioquahoaqua.jpeg" alt="">
                                        <div class="infor_item">
                                            <span>Xoài ngon</span>
                                            <br>
                                            <span>x1</span>
                                        </div>
                                    </div>
                                    <div class="infor_item-right">
                                        <p class="status">Đã hủy</p>
                                        <div class="price">
                                            <p class="price__old">128.000vnd</p>
                                            <p class="price__new">100.000vnd</p>

                                        </div>
                                    </div>

                                </div>
                                <div class="thanhtien">
                                    <div></div>
                                    <div class="thanhtien_item">
                                        <p>Thành tiền: 230.000vnd </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-top_content_item ">
                            <h3>Đây là thẻ h2</h3>
                        </div>
                        <div class="row-top_content_item">
                            <h3>Đây là thẻ h3</h3>
                        </div>
                        <div class="row-top_content_item">
                            <h3>Đây là thẻ h4</h3>
                        </div>
                        <div class="row-top_content_item">
                            <h3>Đây là thẻ h5</h3>
                        </div>
                    </div>


                </div>
                <script>
                    const $ = document.querySelector.bind(document);
                    const $$ = document.querySelectorAll.bind(document);

                    const tabs = $$('.row-top_title-infor li');
                    const panes = $$('.row-top_content .row-top_content_item');

                    const tabActive = $('.row-top_content .row-top_content_item.active');
                    // const line = $('.row-top_title .line');

                    // line.style.left = tabActive.offsetLeft + 'px';
                    // line.style.width = tabActive.offsetWidth + 'px';

                    tabs.forEach((tab, index) => {
                        const pane = panes[index];
                        console.log(pane)
                        tab.onclick = function () {
                            $('.row-top_title-infor li.active').classList.remove('active');
                            $('.row-top_content_item.active').classList.remove('active');

                            // line.style.left = this.offsetLeft + 'px';
                            // line.style.width = this.offsetWidth + 'px';

                            this.classList.add('active');
                            pane.classList.add('active');
                        };
                    });
                </script>

            </div>

        </div>
    </section>
<style>
    .status_order {
	margin-top: 32px;
	margin-bottom: 32px;
}

.row-top_title {
	background-color: #f5f5f5;
}

.row-top_title ul.row-top_title-infor {
	display: flex;
	justify-content: center;
	gap: 40px;
	align-items: center;
	font-size: 18px;
	list-style: none;
	padding: 10px;
}

.row-top_title {
	position: relative;
}

.row-top_title-infor {
	list-style: none;
	padding: 0;
	margin: 0;
	display: flex;
}

.row-top_title-infor li {
	margin-right: 20px;
	padding-bottom: 10px;
	cursor: pointer;
	position: relative;
}

.row-top_title-infor li:after {
	content: "";
	position: absolute;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 5px;
	border-radius: 3px;
	background-color: transparent;
	/* Set the initial color to transparent */
	transition: background-color 0.3s ease;
	/* Add transition for a smoother effect */
}

.row-top_title-infor li.active:after {
	background-color: red;
	/* Replace with the desired color */
}

.row-top_content_item.active {
	display: block;
}

.row-top_content {
	margin: 20px 0;
	background-color: #f5f5f5;
}

.row-top_content_item {
	display: none;
}

.row-top_content_item_row {
	display: flex;
	justify-content: space-between;
	padding: 16px;
	border-bottom: 2px solid rgb(221, 221, 221);
}

.infor_item-left img {
	width: 20%;
}

.infor_item-right .price {
	display: flex;
	gap: 8px;
}

.infor_item-right .price .price__old {
	font-size: 14px;
	text-decoration: line-through;
}

.infor_item-right .price .price__new {
	font-size: 16px;
	font-weight: 550;
	color: #7fad39;
}

.infor_item-left {
	display: flex;
	gap: 8px;
}

.row-top_content_item_full .thanhtien {
	display: flex;
	justify-content: space-between;

}

.row-top_content_item_full .thanhtien .thanhtien_item {
	padding-right: 16px;

}
.row-top_content_item_full .thanhtien .thanhtien_item p{
	font-size: 19px;
	font-weight: 600;
	color:rgb(13, 184, 28) ;
}
</style>