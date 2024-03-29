<?php

use Illuminate\Database\Seeder;
use App\Teams;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// fix data to play with
    	// [name, country, is domestic winner, logo url, group name]
        $teamData = array(
        	["Real Madrid","ESP",1,"http://content.sportslogos.net/logos/60/1569/thumbs/156967392014.gif"],
			["Atlético Madrid","ESP",1,"http://content.sportslogos.net/logos/60/1570/thumbs/157097102014.gif"],
			["Bayern München","GER",1,"http://content.sportslogos.net/logos/60/1571/thumbs/157114611992.gif"],
			["Barcelona","ESP",1,"http://content.sportslogos.net/logos/60/1573/thumbs/lr0n2en8uwlezuhv9puh2vikh.gif"],
			["Juventus","ITA",1,"http://content.sportslogos.net/logos/60/1574/thumbs/157492442014.gif"],
			["Paris Saint-Germain","FRA",1,"http://content.sportslogos.net/logos/60/1575/thumbs/157568882013.gif"],
			["Manchester City","ENG",1,"http://content.sportslogos.net/logos/60/1576/thumbs/157641962008.gif"],
			["Lokomotiv Moskva","RUS",1,"http://content.sportslogos.net/logos/60/1577/thumbs/6426.gif"],
			["Borussia Dortmund","GER",0,"http://content.sportslogos.net/logos/60/1578/thumbs/6427.gif"],
			["Porto","POR",0,"http://content.sportslogos.net/logos/60/1579/thumbs/rkihzr0cc5zoko9fmohwdgcmt.gif"],
			["Manchester United","ENG",0,"http://content.sportslogos.net/logos/60/1580/thumbs/hzpdvrafrrhawjinarpqk7aeo.gif"],
			["Shakhtar Donetsk","UKR",0,"http://content.sportslogos.net/logos/60/1583/thumbs/k1js56fwjkbu5fi8ejaj.gif"],
			["Napoli","ITA",0,"http://content.sportslogos.net/logos/60/1584/thumbs/fhog36hh6hpv66efh8nwy2qig.gif"],
			["Tottenham Hotspur","ENG",0,"http://content.sportslogos.net/logos/60/1588/thumbs/mom61anzdl1z3hhyiuf0gwu6r.gif"],
			["Roma","ITA",0,"http://content.sportslogos.net/logos/60/1585/thumbs/wmx4qrrwy6js4bgg3s7a58zhe.gif"],
			["Liverpool","ENG",0,"http://content.sportslogos.net/logos/60/1589/thumbs/rtfatjmo1l3nhzl4panooj81r.gif"],
			["Schalke","GER",0,"http://content.sportslogos.net/logos/60/1590/thumbs/6433.gif"],
			["Lyon","FRA",0,"http://content.sportslogos.net/logos/60/1591/thumbs/159190052008.gif"],
			["Monaco","FRA",0,"http://content.sportslogos.net/logos/60/1592/thumbs/159293702003.gif"],
			["CSKA Moskva","RUS",0,"http://content.sportslogos.net/logos/60/1593/thumbs/6436.gif"],
			["Valencia","ESP",0,"http://content.sportslogos.net/logos/60/1594/thumbs/3gltfmetu7tg1z3nkip6r6fdx.gif"],
			["Viktoria Plzeň","CZE",0,"http://content.sportslogos.net/logos/60/1609/thumbs/6jixv6z803yejmfh9h09koif9.gif"],
			["Club Brugge","BEL",0,"http://content.sportslogos.net/logos/60/1602/thumbs/efg759jgtzghwdv6rehn.gif"],
			["Galatasaray","TUR",0,"http://content.sportslogos.net/logos/60/1603/thumbs/x08bdx00ynt344rbh9lc.gif"],
			["Internazionale Milano","ITA",0,"http://content.sportslogos.net/logos/60/4177/thumbs/7ltea5izpeg2v7571gn4jxtei.gif"],
			["Hoffenheim","GER",0,"http://content.sportslogos.net/logos/60/1604/thumbs/sbum9jq0hqehhlrfz5ze.gif"],
			["Benfica","POR",0,"http://content.sportslogos.net/logos/60/1605/thumbs/160555362011.gif"],
			["Ajax","NED",0,"http://content.sportslogos.net/logos/60/1606/thumbs/160639902015.gif"],
			["PSV Eindhoven","NED",0,"http://content.sportslogos.net/logos/60/1607/thumbs/oyfvf2xvh4a847wefifl.gif"],
			["Young Boys","SUI",0,"http://content.sportslogos.net/logos/60/1608/thumbs/v15suvcxfqmet97dafhg.gif"],
			["Crvena zvezda","SRB",0,"http://content.sportslogos.net/logos/60/1619/thumbs/dy2lwneinnfbgliyr8zf.gif"],
			["AEK Athens","GRE",0,"http://content.sportslogos.net/logos/60/1620/thumbs/s41innpdn9ai4mhy19j6.gif"]
        );

        foreach ($teamData as $key => $value) {
        	Teams::create([
				'name' => $value[0],
				'country' => $value[1],
				'is_domestic_winner' => $value[2],
				'club_logo' => $value[3]
        	]);
        }
    }
}
