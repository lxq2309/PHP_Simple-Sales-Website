<style>
    * {
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
    }

    .header a.active {
        text-decoration: underline;
        font-weight: bolder;
        color: green;
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
        margin: 0;
        width: 100%;
    }

    .main h2 {
        text-align: center;
        text-transform: uppercase;
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
        background-color: rgba(218, 242, 218, 0.4);
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

    .product-detail .add-to-cart {
        margin-top: 20px;
    }

    .product-detail .add-to-cart button {
        background-color: aqua;
        padding: 10px;
    }

    .footer {
        text-align: center;
    }

    .register {
        margin: 0 auto;
        width: 50%;
        background-color: rgba(218, 242, 218, 0.7);
    }

    .register input,
    .register textarea {
        width: 100%;
    }

    .register table tr td:first-child {
        text-align: right;
        padding-right: 10px;
        vertical-align: top;
    }

    .register table tr:last-child {
        text-align: right;
    }

    .register table tr:last-child input {
        width: 100px;
    }

    .register table {
        width: 100%;
        padding-right: 15%;
    }

    .register table td {
        padding-bottom: 20px;
    }

    .register>h2 {
        text-transform: uppercase;
        text-align: center;
        border: 1px solid black;
        background-color: rgba(218, 242, 218, 0.4);
    }

    .login {
        margin: 0 auto;
        width: 50%;
        background-color: rgba(218, 242, 218, 0.7);
    }

    .login input,
    .login textarea {
        width: 100%;
    }

    .login table tr td:first-child {
        text-align: right;
        padding-right: 10px;
        vertical-align: top;
    }

    .login table tr:last-child {
        text-align: right;
    }

    .login table tr:last-child input {
        width: 100px;
    }

    .login table {
        width: 100%;
        padding-right: 15%;
    }

    .login table td {
        padding-bottom: 20px;
    }

    .login>h2 {
        text-transform: uppercase;
        text-align: center;
        border: 1px solid black;
        background-color: rgba(218, 242, 218, 0.4);
    }

    .customer-detail {
        width: 100%;
        height: 500px;
        border: 1px solid black;
    }

    .customer-detail .top {
        width: 100%;
        height: 70%;
        float: left;
        padding: 10px;
    }

    .customer-detail .top .left {
        display: inline-block;
        width: 33%;
        height: 100%;
        float: left;
    }

    .customer-detail .top .left .image {
        display: inline-block;
        width: 100%;
        height: 100%;
        padding: 0 10px;
    }

    .customer-detail .top .right {
        display: inline-block;
        width: 66%;
        height: 100%;
        float: left;
    }

    .customer-detail .bottom {
        border-top: 1px solid black;
        padding: 30px 20px;
        width: 100%;
        height: 30%;
        float: left;
    }

    .customer-detail .name {
        font-size: 30px;
        font-weight: bolder;
    }

    .customer-detail .top .right div {
        margin-bottom: 10px;
    }
</style>