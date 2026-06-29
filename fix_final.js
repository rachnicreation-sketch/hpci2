const fs = require('fs');
const path = require('path');

const pagesDir = 'c:/wamp64/www/hpci/pages';
const files = fs.readdirSync(pagesDir).filter(f => f.endsWith('.html') || f.endsWith('.php'));

const replacements = [
    // Punctuation and standalone words
    { from: "600\uFFFD440px", to: "600x440px" },
    { from: " \uFFFD ", to: " à " }, // ' à '
    { from: ">\uFFFD<", to: ">-<" },
    { from: "<span>\uFFFD</span>", to: "<span>-</span>" },
    { from: "<li><span style=\"color: var(--red); font-weight: 800;\">\uFFFD</span>", to: "<li><span style=\"color: var(--red); font-weight: 800;\">-</span>" },
    { from: "<li><span style=\"color: var(--red); font-weight: 800;\"></span>", to: "<li><span style=\"color: var(--red); font-weight: 800;\">-</span>" },
    { from: "<span></span>", to: "<span>-</span>" }, // the ones without \uFFFD that were just missed
    
    // Explicit apostrophe mapping
    { from: "d\uFFFDoptimiser", to: "d'optimiser" },
    { from: "d\uFFFDarr\uFFFDt", to: "d'arrêt" },
    { from: "d\uFFFDarr", to: "d'arr" },
    { from: "d\uFFFDaccidents", to: "d'accidents" },
    { from: "d\uFFFDautres", to: "d'autres" },
    { from: "d\uFFFDhygi\uFFFDne", to: "d'hygiène" },
    { from: "d\uFFFDHygi\uFFFDne", to: "d'Hygiène" },
    { from: "d\uFFFDurgence", to: "d'urgence" },
    { from: "d\uFFFDe", to: "d'e" },
    { from: "d\uFFFDu", to: "d'u" },
    { from: "l\uFFFDefficacit\uFFFD", to: "l'efficacité" },
    { from: "l\uFFFDefficacit", to: "l'efficacit" },
    { from: "l\uFFFDISO", to: "l'ISO" },
    { from: "l\uFFFDam\uFFFDlioration", to: "l'amélioration" },
    { from: "l\uFFFDam", to: "l'am" },
    { from: "l\uFFFDentretien", to: "l'entretien" },
    { from: "l\uFFFDa", to: "l'a" },
    { from: "l\uFFFDi", to: "l'i" },
    { from: "s\uFFFDassurer", to: "s'assurer" },
    { from: "s\uFFFDagit", to: "s'agit" },
    { from: "qu\uFFFDune", to: "qu'une" },
    { from: "qu\uFFFDelles", to: "qu'elles" },
    { from: "qu\uFFFD", to: "qu'" },
    { from: "c\uFFFDest", to: "c'est" },
    { from: "C\uFFFDest", to: "C'est" },
    
    // Specific Words with 'è', 'à', 'ô', 'â', 'î', 'û', 'ê', 'ç'
    { from: "au-del\uFFFD", to: "au-delà" },
    { from: "t\uFFFDches", to: "tâches" },
    { from: "entrep\uFFFDts", to: "entrepôts" },
    { from: "r\uFFFDle", to: "rôle" },
    { from: "r\uFFFDo", to: "rô" },
    { from: "co\uFFFDteuses", to: "coûteuses" },
    { from: "co\uFFFDts", to: "coûts" },
    { from: "ma\uFFFDtrise", to: "maîtrise" },
    { from: "con\uFFFDu", to: "conçu" },
    { from: "fran\uFFFDais", to: "français" },
    { from: "Fran\uFFFDais", to: "Français" },
    { from: "s\uFFFDres", to: "sûres" }, 
    { from: "s\uFFFDrs", to: "sûrs" }, 
    { from: "c\uFFFDti\uFFFDre", to: "côtière" }, 
    { from: "c\uFFFDti\uFFFDres", to: "côtières" },
    { from: "c\uFFFDti", to: "côti" },
    { from: "c\uFFFDur", to: "coeur" }, // coeur
    
    // Rules for 'è'
    { from: "\uFFFDtes", to: "êtes" }, 
    { from: "hygi\uFFFDne", to: "hygiène" },
    { from: "Hygi\uFFFDne", to: "Hygiène" },
    { from: "probl\uFFFDmes", to: "problèmes" },
    { from: "syst\uFFFDme", to: "système" },
    { from: "Syst\uFFFDmes", to: "Systèmes" },
    { from: "pi\uFFFDce", to: "pièce" },
    { from: "Pi\uFFFDce", to: "Pièce" },
    { from: "mod\uFFFDle", to: "modèle" },
    { from: "Mod\uFFFDle", to: "Modèle" },
    { from: "fid\uFFFDle", to: "fidèle" },
    { from: "client\uFFFDle", to: "clientèle" },
    { from: "derni\uFFFDres", to: "dernières" },
    { from: "derni\uFFFDre", to: "dernière" },
    { from: "\uFFFDre", to: "ère" }, // lumière, première, matière...
    { from: "\uFFFDres", to: "ères" }, // lumières...
    
    // Some words end with é(e)(s) that might be caught as `\uFFFD`
    { from: "efficacit\uFFFD", to: "efficacité" },
    { from: "rentabilit\uFFFD", to: "rentabilité" },
    { from: "r\uFFFDactivit\uFFFD", to: "réactivité" },
    { from: "qualit\uFFFD", to: "qualité" },
    
    // For all remaining \uFFFD, replace with 'é'
    { from: "\uFFFD", to: "é" }
];

files.forEach(file => {
    const filePath = path.join(pagesDir, file);
    let content = fs.readFileSync(filePath, 'utf-8');
    
    replacements.forEach(({from, to}) => {
        content = content.split(from).join(to);
    });
    
    fs.writeFileSync(filePath, content, 'utf-8');
});

console.log('done');
