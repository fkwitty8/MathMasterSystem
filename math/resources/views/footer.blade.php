<!-- resources/views/footer.blade.php -->

<footer>
    <div class="footer-content">
        <ul>
            <li><a href="{{ url('/') }}">Back</a></li>
            <li><a href="{{ url('/schools') }}">School history</a></li>
            <li><a href="{{ url('/PUPIL') }}">Pupil history</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </div>
</footer>

<style>
    footer {
        background-color:#002366;
        padding: 20px 0;
        text-align: center;
    }
    .footer-content ul {
        list-style: none;
        padding: 0;
    }
    .footer-content ul li {
        display: inline;
        margin: 0 30px;
    }
    .footer-content ul li a {
        text-decoration: none;
        color: #ffffff;
    }
</style>