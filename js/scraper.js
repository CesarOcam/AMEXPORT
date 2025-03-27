const axios = require('axios');
const cheerio = require('cheerio');

async function scrapeWebsite(url) {
    try {
        const { data } = await axios.get(url);
        const $ = cheerio.load(data);

        const articles = [];
        $('h2.title').each((index, element) => {
            articles.push({
                title: $(element).text(),
                link: $(element).find('a').attr('href')
            });
        });

        console.log(articles);
    } catch (error) {
        console.error(`Error al hacer scraping: ${error.message}`);
    }
}

// URL de ejemplo
scrapeWebsite('https://example.com');
