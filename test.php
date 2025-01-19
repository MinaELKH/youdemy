<svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
  <!-- Gradient pour l'arrière-plan -->
  <defs>
    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#FF6B6B;stop-opacity:1" />
      <stop offset="100%" style="stop-color:#4ECDC4;stop-opacity:1" />
    </linearGradient>
    
    <!-- Gradient pour le cerveau -->
    <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.9" />
      <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.6" />
    </linearGradient>
  </defs>

  <!-- Forme abstraite représentant un cerveau/nuage -->
  <path d="M50 100 C30 70 20 50 40 30 C60 10 90 20 100 40 C120 20 150 20 170 40 C190 20 220 20 240 40 C260 20 290 30 310 50 C330 70 320 90 300 100" 
        fill="url(#grad1)" 
        stroke="white" 
        stroke-width="2"/>

  <!-- Lignes connectées symbolisant l'apprentissage -->
  <path d="M70 80 L120 60 L170 90 L220 50 L270 85" 
        fill="none" 
        stroke="white" 
        stroke-width="3"
        stroke-linecap="round"/>

  <!-- Points de connexion -->
  <circle cx="70" cy="80" r="4" fill="white"/>
  <circle cx="120" cy="60" r="4" fill="white"/>
  <circle cx="170" cy="90" r="4" fill="white"/>
  <circle cx="220" cy="50" r="4" fill="white"/>
  <circle cx="270" cy="85" r="4" fill="white"/>

  <!-- Texte Youdemy avec effet moderne -->
  <text x="50" y="150" 
        font-family="Arial" 
        font-size="48" 
        font-weight="bold" 
        fill="#2C3E50"
        letter-spacing="2">
    YOUDEMY
  </text>

  <!-- Petits cercles décoratifs -->
  <circle cx="40" cy="160" r="3" fill="#FF6B6B"/>
  <circle cx="360" cy="160" r="3" fill="#4ECDC4"/>
  <circle cx="50" cy="170" r="2" fill="#FF6B6B"/>
  <circle cx="350" cy="170" r="2" fill="#4ECDC4"/>
</svg>