jQuery(function($) {
    'use strict'
    var supportsAudio = !!document.createElement('audio').canPlayType;
    if (supportsAudio) {
        var index = 0,
            playing = false,
            mediaPath = 'tracks/',
            extension = '.mp3',
            tracks = [{
                "track": 1,
                "name": "Zelda's Skyward Sword's Lament",
                "length": "4:09",
                "file": "zeldafislament"
            }, {
                "track": 2,
                "name": "Deep Metroid Theme",
                "length": "3:40",
                "file": "deepmetroidtheme"
            }, {
                "track": 3,
                "name": "Castlevania - Killer of Vampire's Heart",
                "length": "4:29",
                "file": "castlevania_killerofvampiresheart"
            }, {
                "track": 4,
                "name": "Punch-Out!!",
                "length": "5:09",
                "file": "punchout"
            }, {
                "track": 5,
                "name": "Mario 64 - Rainbow Ride",
                "length": "2:50",
                "file": "rainbowride"
            }, {
                "track": 6,
                "name": "Goldeneye 007 - Runway",
                "length": "3:08",
                "file": "goldeneyerunway"
            }, {
                "track": 7,
                "name": "Goldeneye 007 - Aztec",
                "length": "2:41",
                "file": "goldeneyeaztec"
            }, {
                "track": 8,
                "name": "No More Heroes",
                "length": "3:06",
                "file": "nmh"
            }, {
                "track": 9,
                "name": "Mario 64 Zelda TP - Dire Dire Cocorico",
                "length": "7:23",
                "file": "mario_zelda_diredirecocorico"
            }, {
                "track": 10,
                "name": "Zelda OoT - Temple of Time",
                "length": "3:45",
                "file": "zelda_templeoftime"
            }, {
                "track": 11,
                "name": "Zelda OoT - Berceuse",
                "length": "1:57",
                "file": "zelda_berceuse"
            }, {
                "track": 12,
                "name": "Zelda OoT - Gerudo Valley",
                "length": "4:04",
                "file": "zelda_valleegerudo"
            }, {
                "track": 13,
                "name": "Zelda Majora's Mask & TP - Song Of Healing",
                "length": "2:14",
                "file": "zelda_songofhealing"
            }, {
                "track": 14,
                "name": "Luigi's Mansion MIX",
                "length": "2:34",
                "file": "luigismansion"
            }, {
                "track": 15,
                "name": "Super Mario World MIX",
                "length": "4:18",
                "file": "supermarioworld"
            }, {
                "track": 16,
                "name": "Secret Of Mana - A Wish",
                "length": "1:56",
                "file": "secretofmana_awish"
            }, {
                "track": 17,
                "name": "FF III - The Boundless Ocean",
                "length": "3:15",
                "file": "ff3_boundlessocean"
            }, {
                "track": 18,
                "name": "Kirby - Green Greens",
                "length": "2:32",
                "file": "kirby_greengreens"
            }, {
                "track": 19,
                "name": "Golden Sun 1&2 - Over Worlds",
                "length": "3:34",
                "file": "goldensun_overworlds"
            }, {
                "track": 20,
                "name": "Golden Sun - Kolima Forest",
                "length": "2:46",
                "file": "goldensun-kolimaforest"
            }, {
                "track": 21,
                "name": "Super Mario Galaxy - Observatoire",
                "length": "1:16",
                "file": "galaxy_obsevatoire"
            }, {
                "track": 22,
                "name": "Mario Kart - Quatier Delfino",
                "length": "2:28",
                "file": "quartier_delfino"
            }, {
                "track": 23,
                "name": "Mario Kart - Rainbow Road",
                "length": "3:29",
                "file": "rainbow_road"
            }, {
                "track": 24,
                "name": "Mario Kart - Royaume Sorbet",
                "length": "2:10",
                "file": "royaume_sorbet"
            }, {
                "track": 25,
                "name": "FMA - Brother",
                "length": "3:08",
                "file": "fma-brother"
            }, {
                "track": 26,
                "name": "Naruto - Sadness And Sorrow",
                "length": "2:24",
                "file": "sadness_and_sorrow"
            }],
            buildPlaylist = $.each(tracks, function(key, value) {
                var trackNumber = value.track,
                    trackName = value.name,
                    trackLength = value.length;
                if (trackNumber.toString().length === 1) {
                    trackNumber = '0' + trackNumber;
                } else {
                    trackNumber = '' + trackNumber;
                }
                $('#plList').append('<li><div class="plItem"><div class="plNum">' + trackNumber + '.</div><div class="plTitle">' + trackName + '</div><div class="plLength">' + trackLength + '</div></div></li>');
            }),
            trackCount = tracks.length,
            npAction = $('#npAction'),
            npTitle = $('#npTitle'),
            audio = $('#audio1').bind('play', function() {
                playing = true;
                npAction.text('Lecture en cours...');
            }).bind('pause', function() {
                playing = false;
                npAction.text('En pause...');
            }).bind('ended', function() {
                npAction.text('En pause...');
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    audio.play();
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }).get(0),
            li = $('#plList li').click(function() {
                var id = parseInt($(this).index());
                if (id !== index) {
                    playTrack(id);
                }
            }),
            loadTrack = function(id) {
                $('.plSel').removeClass('plSel');
                $('#plList li:eq(' + id + ')').addClass('plSel');
                npTitle.text(tracks[id].name);
                index = id;
                audio.src = mediaPath + tracks[id].file + extension;
            },
            playTrack = function(id) {
                loadTrack(id);
                audio.play();
            };
        extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
        loadTrack(index);
    }
});

plyr.setup($('#audio1'), {});