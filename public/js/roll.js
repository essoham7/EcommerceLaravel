public class Palindrome {
    public static String inverse(String s) {
	int longueur = s.length();
	StringBuffer envers = new StringBuffer();
	int i;

	for (i = 0; i < longueur; i++) {
	    envers.append(s.charAt(longueur - i - 1));
	}
	return new String(envers);
    }
}

class EssaiPalindrome {
    public static void main(String[] arg) {
	String chaine = arg[0];
	String autre = Palindrome.inverse(chaine);
	System.out.println("L'inverse de " + chaine + " est " + autre);
	if (autre.equals(chaine))
	    System.out.println(chaine + " est un palindrome");
	else
	    System.out.println(chaine + " n'est pas un palindrome");
    }
}