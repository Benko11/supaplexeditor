<nav id="administration">
    <form action="" name="changes" method="post">
        <button id="levels">Levels</button>
        <button id="save" type="submit" name="submit">Save ▼</button>

        <select name="" id="elements">
            @foreach ($elements as $hex=>$element)
            <option value="{{$elements_images[$hex]}}">{{$element}}</option>
            @endforeach
        </select>
    </form>
</nav>