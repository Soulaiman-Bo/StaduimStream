-- CREATE TABLE Teams (
--   team_id INT PRIMARY KEY AUTO_INCREMENT,
--   team_name VARCHAR(255) NOT NULL,
--   founded_year INT,
--   country_id INT NOT NULL,
--   FOREIGN KEY (country_id) REFERENCES countries(country_id),
--   stadium_name VARCHAR(255),
--   stadium_capacity INT,
--   logo_url VARCHAR(255),
--   website_url VARCHAR(255),
--   league_id INT,
--   FOREIGN KEY (league_id) REFERENCES leagues(league_id),
--   division VARCHAR(255),
--   current_manager VARCHAR(255),
--   trophies_won INT,
--   rival_team_id INT,
--   FOREIGN KEY (rival_team_id) REFERENCES teams(team_id),
--   social_media_links JSON,
--   UNIQUE (team_name) -- Optional, ensures unique team names
-- );

CREATE TABLE Teams (
  team_id INT PRIMARY KEY AUTO_INCREMENT,
  team_name VARCHAR(255) NOT NULL UNIQUE,
  founded_year INT,
  country_name VARCHAR(255) NOT NULL,
  stadium_name VARCHAR(255),
  stadium_capacity INT,
  logo_url VARCHAR(255),
  website_url VARCHAR(255),
  league_name VARCHAR(255),
  division VARCHAR(255),
  current_manager VARCHAR(255)
);