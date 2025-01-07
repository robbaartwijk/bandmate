<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $date = Carbon::now()->modify('-2 year');
        $createdDate = clone $date;

        // Alternative
        DB::table('genres')->insert([
            'name' => 'Drum and Bass',
            'group' => 'Alternative',
            'description' => 'English based style containing fast breakbeats, heavy basslines and synthesizers.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);

        // Rock
        DB::table('genres')->insert([
            'name' => 'Rock',
            'group' => 'Rock',
            'description' => 'Rock music is a broad genre of popular music that originated as "rock and roll" in the United States in the late 1940s and early 1950s, developing into a range of different styles in the mid-1960s and later, particularly in the United States and the United Kingdom.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Hard Rock',
            'group' => 'Rock',
            'description' => 'Hard rock is a loosely defined subgenre of rock music that began in the mid-1960s, with the garage, psychedelic and blues rock movements. It is typified by a heavy use of aggressive vocals, distorted electric guitars, bass guitar, drums, and often accompanied with keyboards.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Heavy Metal',
            'group' => 'Rock',
            'description' => 'Heavy metal is a genre of rock music that developed in the late 1960s and early 1970s, largely in the United Kingdom and the United States. With roots in blues rock, psychedelic rock, and acid rock, heavy metal bands developed a thick, massive sound, characterized by distortion, extended guitar solos, emphatic beats, and loudness.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Progressive Rock',
            'group' => 'Rock',
            'description' => 'Progressive rock (shortened as prog; sometimes called art rock, classical rock or symphonic rock) is a broad genre of rock music that developed in the United Kingdom and United States throughout the mid- to late 1960s. Initially termed "progressive pop", the style was an outgrowth of psychedelic bands who abandoned standard pop traditions in favour of instrumentation and compositional techniques more frequently associated with jazz, folk, or classical music.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);

        // Jazz
        DB::table('genres')->insert([
            'name' => 'Jazz',
            'group' => 'Jazz',
            'description' => 'Jazz is a music genre that originated in the African-American communities of New Orleans, United States, in the late 19th and early 20th centuries, with its roots in blues and ragtime. Since the 1920s Jazz Age, it has been recognized as a major form of musical expression in traditional and popular music, linked by the common bonds of African-American and European-American musical parentage.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Smooth Jazz',
            'group' => 'Jazz',
            'description' => 'Smooth jazz is a genre of commercially oriented crossover jazz that became dominant in the 1980s and early 1990s. It is characterized by a blend of jazz with pop-style production and sometimes elements of R&B, funk, and pop music.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Fusion',
            'group' => 'Jazz',
            'description' => 'Jazz fusion (also known as fusion) is a music genre that developed in the late 1960s when musicians combined jazz harmony and improvisation with rock music, funk, and rhythm and blues. Electric guitars, amplifiers, and keyboards that were popular in rock and roll started to be used by jazz musicians, particularly those who had grown up listening to rock and roll.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);

        // Blues
        DB::table('genres')->insert([
            'name' => 'Blues',
            'group' => 'Blues',
            'description' => 'Blues is a music genre and musical form which was originated in the Deep South of the United States around the 1860s by African-Americans from roots in African musical traditions, African-American work songs, and spirituals. Blues incorporated spirituals, work songs, field hollers, shouts, chants, and rhymed simple narrative ballads.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Chicago Blues',
            'group' => 'Blues',
            'description' => 'Chicago blues is a form of blues music that developed in Chicago, Illinois, in the 1950s. The Chicago blues is a type of urban blues. Urban blues evolved from classic blues following the Great Migration, or the Great Northern Drive, which was both forced and voluntary at times, of African Americans from the southern United States to the industrial cities of the north, such as Chicago.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Delta Blues',
            'group' => 'Blues',
            'description' => 'Delta blues is one of the earliest-known styles of blues music. It originated in the Mississippi Delta, a region of the United States that stretches from Memphis, Tennessee in the north to Vicksburg, Mississippi in the south, the Mississippi River on the west to the Yazoo River on the east.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);

        // Classical
        DB::table('genres')->insert([
            'name' => 'Classical',
            'group' => 'Classical',
            'description' => 'Classical music is art music produced or rooted in the traditions of Western culture, generally considered to have begun in Europe after the fall of the Western Roman Empire in the late 5th century and continuing to present day. The major time divisions of classical music are as follows: the early music period, which includes the Medieval (500–1400) and the Renaissance (1400–1600) eras; the Common practice period, which includes the Baroque (1600–1750), Classical (1750–1820), and Romantic eras (1804–1910); and the 20th and 21st centuries, which includes the modern (1890–1930) that overlaps from the late 19th-century, the high modern (mid 20th-century), and contemporary or postmodern (1975–present) eras.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Baroque',
            'group' => 'Classical',
            'description' => 'The Baroque is a highly ornate and often extravagant style of architecture, art and music that flourished in Europe from the early 17th until the late 18th century. It followed the Renaissance style and preceded the Rococo (in the past often referred to as late Baroque) and Neoclassical styles.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Romantic',
            'group' => 'Classical',
            'description' => 'Romantic music is a stylistic movement in Western orchestral music associated with the period of the nineteenth century that is commonly referred to as the Romantic era. It is closely related to the broader concept of Romanticism—the intellectual, artistic, literary, and philosophical movement that became prominent in Europe from approximately 1800 until 1910.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);

        // Pop
        DB::table('genres')->insert([
            'name' => 'Pop',
            'group' => 'Pop',
            'description' => 'Pop music is a genre of popular music that originated in its modern form during the mid-1950s in the United States and the United Kingdom. The terms "popular music" and "pop music" are often used interchangeably, although the former describes all music that is popular and includes many disparate styles.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Dance Pop',
            'group' => 'Pop',
            'description' => 'Dance-pop is a popular music subgenre that originated in the early 1980s. It is generally uptempo music intended for nightclubs with the intention of being danceable but also suitable for contemporary hit radio. Developing from a combination of dance and pop with influences of disco, post-disco and synth-pop, it is generally characterised by strong beats with easy, uncomplicated song structures which are generally more similar to pop music than the more free-form dance genre, with an emphasis on melody as well as catchy tunes.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Synth Pop',
            'group' => 'Pop',
            'description' => 'Synth-pop (short for synthesizer pop; also called techno-pop) is a subgenre of new wave music that first became prominent in the late 1970s and features the synthesizer as the dominant musical instrument. It was prefigured in the 1960s and early 1970s by the use of synthesizers in progressive rock, electronic, art rock, disco, and particularly the "Krautrock" of bands like Kraftwerk.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);

        // Country
        DB::table('genres')->insert([
            'name' => 'Country',
            'group' => 'Country',
            'description' => 'Country music, also known as country and western (or simply country), and hillbilly music, is a genre of popular music that takes its roots from genres such as blues and old-time music, and various types of American folk music including Appalachian, Cajun, and the cowboy Western music styles of New Mexico, Red Dirt, Tejano, and Texas country.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Bluegrass',
            'group' => 'Country',
            'description' => 'Bluegrass music is a genre of American roots music that developed in the 1940s in the United States Appalachian region. The genre derives its name from the band Bill Monroe and the Blue',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Western Swing',
            'group' => 'Country',
            'description' => 'Western swing music is a subgenre of American country music that originated in the late 1920s in the West and South among the region\'s Western string bands. It is dance music, often with an up-tempo beat, which attracted huge crowds to dance halls and clubs in Texas, Oklahoma and California during the 1930s and 1940s until a federal war-time nightclub tax in 1944 contributed to the genre\'s decline.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);

        // Hip Hop
        DB::table('genres')->insert([
            'name' => 'Hip Hop',
            'group' => 'Hip Hop',
            'description' => 'Hip hop music, also known as rap music, is a genre of popular music developed in the United States by inner-city African Americans, Latino Americans, and Caribbean Americans in the Bronx borough of New York City in the 1970s. It consists of a stylized rhythmic music that commonly accompanies rapping, a rhythmic and rhyming speech that is chanted.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Rap',
            'group' => 'Hip Hop',
            'description' => 'Rapping (or rhyming, spitting, emceeing, MCing) is a musical form of vocal delivery that incorporates "rhyme, rhythmic speech, and street vernacular", which is performed or chanted in a variety of ways, usually over a backing beat or musical accompaniment. The components of rap include "content" (what is being said), "flow" (rhythm, rhyme), and "delivery" (cadence, tone).',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Trap',
            'group' => 'Hip Hop',
            'description' => 'Trap is a subgenre of hip hop music that originated in the Southern United States during the early 1990s. The genre gets its name from the Atlanta slang word "trap", which refers to a place in which drugs are sold illegally. Trap music uses synthesized drums and is characterized by complex hi-hat patterns, tuned kick drums with a long decay (originally from the Roland TR-808 drum machine), atmospheric synths, and lyrical content that often focuses on drug use and urban violence.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);

        // Electronic
        DB::table('genres')->insert([
            'name' => 'Electronic',
            'group' => 'Electronic',
            'description' => 'Electronic music is music that employs electronic musical instruments, digital instruments, or circuitry-based music technology in its creation. It includes both music made using electronic and electromechanical means (electroacoustic music). Pure electronic instruments depended entirely on circuitry-based sound generation, for instance using devices such as an electronic oscillator, theremin, or synthesizer.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'House',
            'group' => 'Electronic',
            'description' => 'House is a genre of electronic dance music characterized by a repetitive four-on-the-floor beat and a tempo of 120 to 130 beats per minute. It was created by DJs and music producers from Chicago\'s underground club culture in the early 1980s, as DJs from the subculture began altering disco dance tracks to give them a more mechanical beat and deeper basslines.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'Techno',
            'group' => 'Electronic',
            'description' => 'Techno is a genre of electronic dance music that is characterized by a repetitive beat which is generally produced for use in a continuous DJ set. The central rhythm is often in common time (4/4), while the tempo typically varies between 120 and 150 beats per minute (bpm). Artists may use electronic instruments such as drum machines, sequencers, and synthesizers, as well as digital audio workstations.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
        DB::table('genres')->insert([
            'name' => 'TripHop',
            'group' => 'Electronic',
            'description' => 'Triphop is a genre of electronic dance music that is characterized by a repetitive beat which is generally produced for use in a continuous DJ set. The central rhythm is often in common time (4/4), while the tempo typically varies between 120 and 150 beats per minute (bpm). Artists may use electronic instruments such as drum machines, sequencers, and synthesizers, as well as digital audio workstations.',
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
        ]);
    }
}
