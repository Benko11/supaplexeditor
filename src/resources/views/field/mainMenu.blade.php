<section class="mainMenu">
    <div class="level">Level {{$info['id']}}</div>
    <div class="levels">Levels</div>

    <div class="details level-details">
        <span class="needed" id="infotrons">{{$info['infotronsNeeded']}}</span>
        <span class="available" id="infotronsAvailable">{{$info['infotronsAvailable']}}</span><br>

        @if ($info['gravity'])
        <div class="on gravity">Gravity</div><br>
        @else
        <div class="off gravity">Gravity</div><br>
        @endif

        @if ($info['freezeZonks'])
        <div class="on freezeZonks">Freeze Zonks</div>
        @else
        <div class="off freezeZonks">Freeze Zonks</div>
        @endif
    </div>

    <nav id="administration">
        <form action="" name="changes" method="post">
            <input type="hidden" name="gravity" value="@if ($info['gravity']) on @else off @endif">
            <select name="elements" id="elements">
                @foreach ($elements as $hex=>$element)
                <option value="{{$elements_images[$hex]}}">{{$element}}</option>
                @endforeach
            </select>

            <button class="save" type="submit" name="submit">Save</button>
        </form>
    </nav>
</section>

<section class="mainMenuHolder"></section>