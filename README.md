# Team Data Extraction Exercise

Please fork this repo and then submit a pull request back to it proposing your solution to the following problem:

We have a table of soccer game videos. The title of some videos contain information about the teams that participated in the game. The team value is either an integer or a capital letter. The goal of this project is to accurately extract the two teams that participated in each game and return them as an array like so:

`[1, 3] // Team 1 vs 3`

`[A, J] // Team A vs J`

Not all videos contain information about the teams that participated. In that case you'll want to return `[null, null]`.

You'll do the work of extracting the teams from the titles in `App\Actions\GetTeamsFromTables`. Note how that class is invoked from an attribute on the GameVideo model.

To view the output of your work, just visit the site root. So, for instance, if you're using valet, visit `http://video-teams.test` or `http://localhost:8000` if you're running `php artisan serve` on port 8000.

To set up the app, simply copy .env.example to .env, run `php artisan key:generate`, make sure the database configured in .env exists, and run `php artisan migrate`. That will create the necessary table and populate it with data.
