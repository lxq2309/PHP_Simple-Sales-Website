<style>
    * {
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
    }

    .header {
        float: left;
        width: 100%;
    }

    .header .left {
        float: left;
        width: 20%;
    }

    .header .right {
        float: left;
        width: 80%;
        text-align: right;
    }

    .header .right ul li {
        display: inline-block;
        border: 1px solid black;
        padding: 5px;
    }

    .sidebar {
        float: left;
        width: 20%;
    }

    .sidebar a.active {
        text-decoration: underline;
        font-weight: bolder;
        color: green;
    }

    .sidebar ul {
        margin: 0;
        padding: 0;
        margin-right: 25px;
    }

    .sidebar ul li {
        list-style: none;
        padding: 5px;
        margin-bottom: 5px;
        border: 1px solid black;
    }

    ul li:hover {
        background-color: #9ccc9c;
    }

    .main {
        float: left;
        width: 80%;
        min-height: 600px;
        padding: 10px;
        padding-top: 0;
    }

    .main h3 {
        border: 1px solid black;
        padding: 5px;
        background-color: bisque;
        
        margin: 0;
    }

    .main button {
        margin: 5px;
    }

    .footer {
        float: left;
        width: 100%;
    }

    .footer {
        text-align: center;
    }
</style>