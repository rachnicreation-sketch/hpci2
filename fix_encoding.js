const fs = require('fs');
const path = require('path');

const pagesDir = 'c:/wamp64/www/hpci/pages';
const files = fs.readdirSync(pagesDir).filter(f => f.endsWith('.html'));

const replacements = {
    "dquipements": "d'équipement",
    "ctire": "côtière",
    "ctires": "côtières",
    "LIngnierie": "L'ingénierie",
    "lingnierie": "l'ingénierie",
    "cur": "coeur",
    "cration": "création",
    "Mise  disposition": "Mise à disposition",
    "qualifis": "qualifiés",
    "sres": "sûres",
    "rglementaires": "réglementaires",
    "Conformit": "Conformité",
    "Sant & Scurit": "Santé & Sécurité",
    "valuer": "évaluer",
    "procdures": "procédures",
    "rle": "rôle",
    "prvention": "prévention",
    "lenvironnement": "l'environnement",
    "quipe": "Équipe",
    "valuation": "Évaluation",
    "adaptes ": "adaptées à",
    "Scurit": "Sécurité",
    "rgulire": "régulière",
    "scurit": "sécurité",
    "mise  disposition": "mise à disposition",
    "bnficiez dune": "bénéficiez d'une",
    "spcialise adapte ": "spécialisée adaptée à",
    " Flexibilit": "- Flexibilité",
    " Accs ": "- Accès à",
    " Concentration": "- Concentration",
    "cur": "coeur",
    "adapt ": "adapté à",
    "<span></span>": "<span>-</span>",
    "vici": "vicié",
    "confin": "confiné",
    "confins": "confinés",
    "lintervention": "l'intervention",
    "lentretien": "l'entretien",
    "dquipements": "d'équipement",
    "dquipements": "d'équipement",
    "nnuphar": "nénuphar",
    "ctires": "côtières",
    "ctire": "côtière",
    "ctre": "côtière",
    "ctire": "côtière",
    "dpandre": "d'épandre",
    "Ingnierie": "Ingénierie",
    "ingnierie": "ingénierie",
    "lindustrie  la technologie": "l'industrie à la technologie",
    "mathmatiques": "mathématiques",
    "dvelopper": "développer",
    "amliorer": "améliorer",
    "systmes": "systèmes",
    "Dveloppement": "Développement",
    "dfis": "défis",
    "cration": "création",
    "rseaux": "réseaux",
    "sophistiqus": "sophistiqués",
    "rpondre": "répondre",
    "socit": "société",
    "crer": "créer",
    "assiste": "assistée",
    "Intgration": "Intégration",
    "Comptences": "Compétences",
    "nergtique": "Énergétique",
    "Vtre": "Votre",
    "LIngnierie": "L'ingénierie",
    "Lengineering": "L'engineering",
    "linnovation": "l'innovation",
    " Conception": "& Conception",
    " lindustrie": "à l'industrie",
    "lapplication": "l'application",
    " la cration": "à la création",
    "lingnierie": "l'ingénierie",
    " Conception": "- Conception",
    " Audits": "- Audits",
    " Plans": "- Plans",
    " Optimisation": "- Optimisation",
    " Nettoyage": "- Nettoyage"
};

files.forEach(file => {
    const filePath = path.join(pagesDir, file);
    let content = fs.readFileSync(filePath, 'utf-8');
    
    // Custom replacements for 
    for (const [key, value] of Object.entries(replacements)) {
        content = content.split(key).join(value);
    }
    
    // Generic replacement of remaining  based on surrounding context?
    // User mentioned: "et d'autre où y' a  à la place de : à é è ô î ï ' ç"
    // Since we fixed the main ones, let's fix a few more obvious ones.
    
    fs.writeFileSync(filePath, content, 'utf-8');
});

console.log('done');
