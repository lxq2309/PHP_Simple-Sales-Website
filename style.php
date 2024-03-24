<style>
    * {
        box-sizing: border-box;
    }
    a {
        text-decoration: none;
    }

    .header a.active {
        text-decoration: underline;
    }

    .header ul li {
        display: inline-block;
        border: 1px solid black;
        padding: 5px;
    }

    .header .left {
        display: inline-block;
        width: 49%;
    }

    .header .right {
        display: inline-block;
        width: 49%;
        text-align: right;
    }

    .main {
        min-height: 600px;
        margin: 0 50px;
    }

    .col {
        display: inline-block;
        width: 33%;
        height: 300px;
        padding: 10px;
    }

    .product {
        border: 1px solid gray;
        width: 100%;
        height: 100%;
        text-align: center;
    }

    .product:hover {
        border-color: #fff;
        background-color: #9ccc9c;
    }

    .product .image {
        display: inline-block;
        width: 40%;
        height: 70%;
    }
    
    .product .image img {
        padding-top: 10px;
    }

    .product .name {
        height: 10%;
        font-weight: bolder;
        font-size: larger;
    }

    .product .price {
        height: 10%;
    }

    .product .detail {
        height: 10%;
    }

    .product-detail {
        width: 100%;
        height: 500px;
        border: 1px solid black;
    }

    .product-detail .top {
        width: 100%;
        height: 70%;
        float: left;
        padding: 10px;
    }

    .product-detail .top .left {
        display: inline-block;
        width: 33%;
        height: 100%;
        float: left;
    }

    .product-detail .top .left .image {
        display: inline-block;
        width: 100%;
        height: 100%;
        padding: 0 10px;
    }

    .product-detail .top .right {
        display: inline-block;
        width: 66%;
        height: 100%;
        float: left;
    }

    .product-detail .bottom {
        border-top: 1px solid black;
        padding: 30px 20px;
        width: 100%;
        height: 30%;
        float: left;
    }

    .product-detail .name {
        font-size: 30px;
        font-weight: bolder;
    }

    .product-detail .description {
        margin-top: 10px;
    }

    .footer {
        text-align: center;
    }
</style>