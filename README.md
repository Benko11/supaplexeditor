# Supaplex Editor (alpha)

This repository contains the source code for the game editor of an older game,
but, in my opinion, still great puzzle game - you've guessed it, Supaplex.

The project is currently based on sole web technologies - PHP, HTML and JavaScript,
and it is its purpose to remain that way. Maybe, it would be good for you to have
an idea of what capabilities this app should have. Here are a few (if something doesn't
make sense to you, I advise that you do a bit of digging before asking):

- Be able to read other level formats (there is DAT, but also SP and MPX)
- Add support for discretionary level sets
- Add support for discretionary level sizes
- Make the editor at least as functional as Supaplex Editor by ElmerProductions
- Fix some glitches that that editor has
- Ability for user accounts where their level sets would be stored and could be downloaded
- Give it a modern GUI, perchance implement some Material Design elements
- Give the user an ability to share their creations with the world, natively from the app.

## Folder structure

The app is contained within `src` directory. Currently, it's overly simplistic, but that
will change over time. There is:

- *LEVELS.DAT* - file with all the levels
- *PLAYER.LST* - file with user data
- *elements.php* - has an array of all the elements stored
- *field.php* - generates the level
- *index.php* - manages the editor

The rest is (I hope) pretty self-explanatory.