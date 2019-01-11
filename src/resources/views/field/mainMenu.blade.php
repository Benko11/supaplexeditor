<section class="mainMenu">
    <form action="" name="changes" method="post">
        <div class="dropup">
            <div class="level" data-toggle="dropdown">Level {{$info['id']}}</div>

            <div class="details level-details dropdown-menu">
                <input type="text" name="infotronsNeeded" maxlength="3" class="needed" value="{{$info['infotronsNeeded']}}">
                <span class="available" id="infotronsAvailable">{{$info['infotronsAvailable']}}</span><br>

                <input type="checkbox"
                       name="gravity"
                       class="toggle"
                       id="gravity-toggle"
                       {{$info['gravity'] ? 'checked' : ''}}>
                <label for="gravity-toggle">
                    Gravity
                </label>

                <input type="checkbox"
                       name="freezeZonks"
                       class="toggle"
                       id="freeze-zonks-toggle"
                       {{$info['freezeZonks'] ? 'checked' : ''}}>
                <label for="freeze-zonks-toggle">
                    Freeze Zonks
                </label>
            </div>
        </div>

        <div class="dropup">
            <div class="levels" data-toggle="dropdown">Levels</div>

            <div class="dropdown-menu details">
                <ul>
                    <li>

                    </li>
                </ul>
            </div>
        </div>

        <nav id="administration">
            <select name="elements" id="elements">
                @foreach ($elements as $hex=>$element)
                <option value="{{$elements_images[$hex]}}">{{$element}}</option>
                @endforeach
            </select>

            <button class="save" type="submit" name="submit">Save</button>

            <a href="#" class="selection-button active"><img src="/icons/cursor.png" alt="Mouse"></a>
            <a href="#" class="selection-button"><img src="/icons/empty-square.png" alt="Empty square"></a>
            <a href="#" class="selection-button"><img src="/icons/full-square.png" alt="Full square"></a>
        </nav>
    </form>
</section>

<section class="mainMenuHolder"></section>
