const fs = require('fs');
const path = require('path');

const pagesDir = 'c:/wamp64/www/hpci/pages';
const files = fs.readdirSync(pagesDir).filter(f => f.endsWith('.html'));

const replacements = [
    // Bio-nettoyage
    { from: "l\uFFFDenvironnement", to: "l'environnement" },
    { from: "d\uFFFDhygi\uFFFDne", to: "d'hygiène" },
    { from: "d\uFFFDhygine", to: "d'hygiène" },
    { from: "vid\uFFFDo", to: "vidéo" },
    { from: "vid\uFFFDos", to: "vidéos" },
    { from: "D\uFFFDsinfection", to: "Désinfection" },
    { from: "d\uFFFDcontamination", to: "décontamination" },
    { from: "pr\uFFFDcision", to: "précision" },
    { from: "P\uFFFDcision", to: "Précision" },
    { from: "certifi\uFFFDs", to: "certifiés" },
    { from: "biod\uFFFDgradables", to: "biodégradables" },
    { from: "sant\uFFFD", to: "santé" },
    { from: "sp\uFFFDcifiques", to: "spécifiques" },
    { from: "Tra\uFFFDabilit\uFFFD", to: "Traçabilité" },
    { from: "compl\uFFFDte", to: "complète" },
    { from: "op\uFFFDrations", to: "opérations" },
    { from: "d\uFFFDsinfection", to: "désinfection" },
    { from: "l'hygi\uFFFDne", to: "l'hygiène" },
    { from: "s\uFFFDcoeurit\uFFFD", to: "sécurité" },
    { from: "\uFFFDlev\uFFFDes", to: "élevées" },
    { from: "r\uFFFDduire", to: "réduire" },
    { from: "l\uFFFDu", to: "l'u" },
    { from: "l\uFFFDi", to: "l'i" },
    { from: "D\uFFFDmonstrations", to: "Démonstrations" },
    { from: "<span>\uFFFD</span>", to: "<span>-</span>" },
    { from: "<li><span style=\"color: var(--red); font-weight: 800;\">\uFFFD</span>", to: "<li><span style=\"color: var(--red); font-weight: 800;\">-</span>" },
    
    // Nettoyage Pro
    { from: "productivit\uFFFD", to: "productivité" },
    { from: "bien-\uFFFDtre", to: "bien-être" },
    { from: "Qualit\uFFFD", to: "Qualité" },
    { from: "qualit\uFFFD", to: "qualité" },
    { from: "d\uFFFDe", to: "d'e" },
    { from: "p\uFFFDriodique", to: "périodique" },
    { from: "r\uFFFDunion", to: "réunion" },
    { from: "\uFFFDpoussetage", to: "époussetage" },
    { from: "d\uFFFDcapage", to: "décapage" },
    { from: "sp\uFFFDcialis\uFFFD", to: "spécialisé" },
    { from: "d\uFFFDchets", to: "déchets" },
    { from: "irr\uFFFDprochable", to: "irréprochable" },
    { from: "d\uFFFDgraissants", to: "dégraissants" },
    { from: "propret\uFFFD", to: "propreté" },
    { from: "r\uFFFDguli\uFFFDre", to: "régulière" },
    { from: "pr\uFFFDservant", to: "préservant" },
    { from: "l\uFFFDesth\uFFFDtique", to: "l'esthétique" },
    { from: "fonctionnalit\uFFFD", to: "fonctionnalité" },
    { from: "durabilit\uFFFD", to: "durabilité" },
    { from: "R\uFFFDsidences", to: "Résidences" },
    { from: "d\uFFFDappartements", to: "d'appartements" },
    { from: "proprit\uFFFDs", to: "propriétés" },
    { from: "r\uFFFDsidentielles", to: "résidentielles" },
    { from: "pi\uFFFDces", to: "pièces" },
    { from: "\uFFFD propos", to: "À propos" },
    { from: "d\uFFFDsherbage", to: "désherbage" },
    { from: "D\uFFFDsinsectisation", to: "Désinsectisation" },
    { from: "D\uFFFDrati", to: "Dérati" },
    { from: "adapt\uFFFD", to: "adapté" },
    { from: "fr\uFFFDquence", to: "fréquence" },
    
    // Maintenance
    { from: "d\uFFFDefaillances", to: "défaillances" },
    { from: "pr\uFFFDventive", to: "préventive" },
    { from: "P\uFFFDtrolier", to: "Pétrolier" },
    { from: "p\uFFFDtroli\uFFFDres", to: "pétrolières" },
    { from: "s\uFFFDcurit\uFFFD", to: "sécurité" },
    { from: "s\uFFFDcuris\uFFFDe", to: "sécurisée" },
    { from: "mat\uFFFDriel", to: "matériel" },
    { from: "p\uFFFDtroliers", to: "pétroliers" },
    { from: "r\uFFFDglementations", to: "réglementations" },
    { from: "mati\uFFFDre", to: "matière" },
    { from: "fiabilit\uFFFD", to: "fiabilité" },
    { from: "long\uFFFDvit\uFFFD", to: "longévité" },
    { from: "\uFFFDquipements", to: "équipements" },
    { from: "m\uFFFDcanique", to: "mécanique" },
    { from: "d\uFFFDpanner", to: "dépanner" },
    { from: "syst\uFFFDmes", to: "systèmes" },
    { from: "g\uFFFDn\uFFFDrateurs", to: "générateurs" },
    { from: "pr\uFFFDcis", to: "précis" },
    { from: "contr\uFFFDo", to: "contrô" },
    { from: "r\uFFFDparation", to: "réparation" },
    { from: "l\uFFFDa", to: "l'a" },
    { from: "d\uFFFD\uFFFD", to: "d'é" },
    { from: "N\uFFFDnuphar", to: "Nénuphar" },
    { from: "\uFFFDr\uFFFDmeur", to: "Écrémeur" },
    { from: "r\uFFFDduit", to: "réduit" },
    { from: "arr\uFFFDts", to: "arrêts" },
    { from: "co\uFFFDts", to: "coûts" },
    { from: "b\uFFFDen\uFFFDi", to: "bénéfici" },
    { from: "d\uFFFDu", to: "d'u" },
    { from: "d\uFFFDtach\uFFFD", to: "détaché" },
    { from: "tranquillit\uFFFD", to: "tranquillité" },
    
    // Phytosanitaire
    { from: "S\uFFFDcurit\uFFFD", to: "Sécurité" },
    { from: "V\uFFFDg\uFFFDtale", to: "Végétale" },
    { from: "Sant\uFFFD", to: "Santé" },
    { from: "V\uFFFDg\uFFFDtaux", to: "Végétaux" },
    { from: "pr\uFFFDserver", to: "préserver" },
    { from: "p\uFFFDerenni", to: "pérenni" },
    { from: "D\uFFFDsherbage", to: "Désherbage" },
    { from: "M\uFFFDthodes", to: "Méthodes" },
    { from: "\uFFFDcologiques", to: "écologiques" },
    { from: "contr\uFFFDo", to: "contrô" },
    { from: "ind\uFFFDsirables", to: "indésirables" },
    { from: "pr\uFFFDvention", to: "prévention" },
    { from: "cibl\uFFFDs", to: "ciblés" },
    { from: "prot\uFFFDger", to: "protéger" },
    { from: "v\uFFFDg\uFFFDtation", to: "végétation" },
    { from: "bact\uFFFDriennes", to: "bactériennes" },
    { from: "Pr\uFFFDservation", to: "Préservation" },
    { from: "biodiversit\uFFFD", to: "biodiversité" },
    { from: "privil\uFFFDgiant", to: "privilégiant" },
    { from: "\uFFFDcosyst\uFFFDmes", to: "écosystèmes" },
    { from: "d\uFFFDmarche", to: "démarche" },
    { from: "raisonn\uFFFDe", to: "raisonnée" },
    
    // Engineering
    { from: "c\uFFFDur", to: "coeur" },
    { from: "L\uFFFDIng\uFFFDnierie", to: "L'ingénierie" },
    { from: "l\uFFFDi", to: "l'i" },
    { from: "math\uFFFDmatiques", to: "mathématiques" },
    { from: "d\uFFFDvelopper", to: "développer" },
    { from: "am\uFFFDliorer", to: "améliorer" },
    { from: "D\uFFFDveloppement", to: "Développement" },
    { from: "d\uFFFDfis", to: "défis" },
    { from: "cr\uFFFDa", to: "créa" },
    { from: "r\uFFFDseaux", to: "réseaux" },
    { from: "sophistiqu\uFFFDs", to: "sophistiqués" },
    { from: "r\uFFFDpondre", to: "répondre" },
    { from: "soci\uFFFDt\uFFFD", to: "société" },
    { from: "cr\uFFFDe", to: "crée" },
    { from: "assist\uFFFDe", to: "assistée" },
    { from: "Int\uFFFDgration", to: "Intégration" },
    { from: "Comp\uFFFDtences", to: "Compétences" },
    { from: "Ing\uFFFDnierie", to: "Ingénierie" },
    { from: "\uFFFDnerg\uFFFDtique", to: "Énergétique" },
    { from: "V\uFFFDo", to: "Vo" }, // Vtre -> Votre
    { from: "V\uFFFDtre", to: "Votre" },

    // Misc
    { from: " \uFFFD ", to: " à " }
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
