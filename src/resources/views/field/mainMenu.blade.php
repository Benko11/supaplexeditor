<section class="mainMenu">
    <div class="level">Level {{$info['id']}}</div>

    <div class="levels">Levels</div>


    <form action="" name="changes" method="post">
        <div class="details level-details">
            <input type="text" name="infotronsNeeded" maxlength="3" class="needed" value="{{$info['infotronsNeeded']}}">
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

            <br>
            <input type="text" name="name" class="text-white" placeholder="Name" maxlength="23" value="{{$info['niceName']}}" spellcheck="false" autocomplete="off">
        </div>

        <nav id="administration">
            <input type="hidden" name="gravity" value="@if ($info['gravity']) on @else off @endif">
            <input type="hidden" name="freezeZonks" value="@if ($info['freezeZonks']) on @else off @endif">
            <select name="elements" id="elements">
                @foreach ($elements as $hex=>$element)
                <option value="{{$elements_images[$hex]}}">{{$element}}</option>
                @endforeach
            </select>

            <button class="save" type="submit" name="submit">Save</button>

            <a href="#" class="selection-button"><img src="/icons/cursor.png" alt="Mouse"></a>
            <a href="#" class="selection-button"><img src="/icons/empty-square.png" alt="Empty square"></a>
            <a href="#" class="selection-button"><img src="/icons/full-square.png" alt="Full square"></a>
        </nav>
    </form>
</section>

<section class="mainMenuHolder"></section>